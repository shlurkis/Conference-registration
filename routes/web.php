<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});
Route::get('/user', function () {
    $conferences = \App\Models\Conference::all();
    return view('user.index', compact('conferences'));
});
Route::get('/employee', function () {
    $conferences = \App\Models\Conference::with('users')->get();
    return view('employee.index', compact('conferences'));
});
Route::prefix('admin')->group(function () {
    Route::resource('conferences', ConferenceController::class);
    Route::resource('users', UserController::class);
});
Route::get('/admin', function () {
    return view('admin');
})->name('admin');
Route::post('/register/{conference}', [UserController::class, 'registerForConference'])->name('register');

