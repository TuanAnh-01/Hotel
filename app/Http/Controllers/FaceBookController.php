<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class FaceBookController extends Controller
{
/**
 * Login Using Facebook
 */
 public function loginUsingFacebook()
 {
   
    return Socialite::driver('facebook')->redirect();
 }

 public function callbackFromFacebook()
 {
  try {
       $user = Socialite::driver('facebook')->user();

       $saveUser = User::updateOrCreate([
           'facebook_id' => $user->getId(),
       ],[
           'name' => $user->getName(),
           'email' => $user->getEmail(),
           'profile_photo_path' => $user->getAvatar(),
           
           'phone' => '0123456',
           'password' => Hash::make($user->getName().'@'.$user->getId())
            ]);

      // dd($saveUser);

       Auth::loginUsingId($saveUser->id);

       return redirect()->route('dashboard');
       } catch (\Throwable $th) {
          throw $th;
       }
   }
}