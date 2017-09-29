<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');

Route::get('/users', 'UserController@index')->name('users');
Route::get('/users/data', 'UserController@data')->name('users.data');
Route::resource('users', 'UserController');

Route::get('/admins', 'AdminController@index')->name('admins');
Route::get('/admins/data', 'AdminController@data')->name('admins.data');
Route::resource('admins', 'AdminController');
