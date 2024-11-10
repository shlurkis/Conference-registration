<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('home');
});
Route::get('/user', function () {
    $users = User::all();
    $conferences = \App\Models\Conference::all();
    return view('user.index', compact('conferences', 'users'));
});
Route::get('/employee', function () {
    $conferences = \App\Models\Conference::with('users')->get();
    return view('employee.index', compact('conferences'));
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('conferences', ConferenceController::class);
    Route::resource('users', UserController::class);
});
Route::post('/register/{conference}', [UserController::class, 'registerForConference'])->name('register');

Route::get('/auth', [AuthController::class, 'showRegistrationForm'])->name('auth.show');
Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/user', [UserController::class, 'index']);
Route::get('/user', [UserController::class, 'index'])->name('user.index');

Route::delete('/admin/conferences/{conference}/participants/{user}', 
    [ConferenceController::class, 'removeParticipant'])->name('admin.conferences.removeParticipant');

Route::get('locale/{locale}', function ($locale) {
     if (in_array($locale, ['en', 'lt'])) {
           session(['locale' => $locale]);
       }
       return redirect()->back();
   })->name('locale.switch');