<?php

 

Route::get('/', function () {
    return view('pages.home');
});

Route::resource('flyers', 'FlyersController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
