<?php

Route::get('/home', function () {
    return view('admin.home');
})->name('home');

Route::get('/users', 'UserController@index')->name('users');
Route::get('/users/data', 'UserController@data')->name('users.data');
Route::resource('users', 'UserController');

Route::get('/admins', 'AdminController@index')->name('admins');
Route::get('/admins/data', 'AdminController@data')->name('admins.data');
Route::resource('admins', 'AdminController');

Route::get('/pages', 'PageController@index')->name('pages');
Route::get('/pages/data', 'PageController@data')->name('pages.data');
Route::resource('pages', 'PageController');

// Debugging
Route::get('logs', 'LogViewerController@index')->name('logs');
