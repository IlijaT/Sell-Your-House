<?php

use App\Http\Controllers\PhotoController;

Route::get('/', function () {
    return view('pages.home');
});


Route::resource('flyers', 'FlyersController')->except([
    'show'
]);

Route::get('{zip}/{street}', 'FlyersController@show')->name('flyers.show');
Route::post('{zip}/{street}/photos', 'FlyersController@addPhoto')->name('flyers.addPhoto');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::delete('/photos/{photo}', 'PhotosController@destroy');
