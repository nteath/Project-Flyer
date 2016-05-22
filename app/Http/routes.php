<?php

Route::get('/', 'PagesController@index');
Route::get('/test', 'PagesController@test');

Route::auth();


Route::resource('flyers', 'FlyersController');
Route::get('{zip}/{street}', 'FlyersController@show');
Route::post('{zip}/{street}/photos', 'FlyersController@addPhoto');
