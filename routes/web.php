<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\FaceBookController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login/facebook/callback', function() {
    return 'Callback login facebook';
});

Route::get('/login/facebook', function() {
    return Socialite::driver('github')->redirect();
});

Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', [FaceBookController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [FaceBookController::class, 'callbackFromFacebook'])->name('callback');
    
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/history', [HistoryController::class, 'index'])->name('history');
    Route::get('/historyEvent', [HistoryController::class, 'historyEvent'])->name('historyEvent');

    Route::resource('/Event', EventController::class);
    Route::post('/Booking/payement', [BookingController::class, 'keySession'])->name('Booking.keySession');
    Route::post('/Event/paymentEvent', [EventController::class, 'keySession'])->name('Event.keySession');
    Route::post('/Event/Comment', [EventController::class, 'createComment'])->name('Event.createComment');
    
    Route::resource('/Booking', BookingController::class);
    Route::get('/Contact', function () {
        return view('Contact');
    })->name('Contact');

    Route::get('/Showevent', function () {
        return view('Showevent');
    });

    Route::post('/Contact/Send-mail', [MailController::class, 'index'])->name('Contact.send-mail');
});


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');