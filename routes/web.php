<?php

 

Route::get('/', function () {
    return view('pages.home');
});


Route::resource('flyers', 'FlyersController')->except([
    'show'
]);

Route::get('{zip}/{street}', 'FlyersController@show')->name('flyers.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
