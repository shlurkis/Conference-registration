<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/user', function () {
    return view('user');
});
Route::get('/employee', function () {
    return view('employee');
});
Route::get('/admin', function () {
    return view('admin');
});
