<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('demo/users', UserController::class);
    $router->resource('demo/event', EventController::class);
    $router->resource('demo/booking', BookingController::class);
    $router->resource('demo/book', BookController::class);
    $router->resource('demo/banner', BannerController::class);
    $router->resource('demo/bookevent', BookeventController::class);
    $router->resource('demo/comment', CommentController::class);
});
