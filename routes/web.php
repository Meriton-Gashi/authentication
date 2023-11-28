<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ContactController;


Route::get('/', [WebsiteController::class, 'index'])->name('home');

Route::get('/dashboard', [WebsiteController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::get('/login', [WebsiteController::class, 'login'])->name('login');
Route::post('/login-submit', [WebsiteController::class, 'login_submit'])->name('login_submit');

Route::get('/logout', [WebsiteController::class, 'logout'])->name('logout');


/* */
Route::get('/phonebook', [WebsiteController::class, 'phonebook'])->name('phonebook');
Route::get('/editContact', [WebsiteController::class, 'editContact'])->name('editContact');
Route::put('/editoContact', [ContactController::class, 'editoContact'])->name('editoContact');

Route::get('editoContacts/{id}', [ContactController::class, 'edit'])->name('editoContacts');
Route::put('updateContact/{id}', [ContactController::class, 'update'])->name('updateContact');

// Route::get('deleteContactID/{id}', 'ContactController@deleteContact');
Route::delete('deleteContactID/{id}', 'App\Http\Controllers\ContactController@deleteContact');


/* */
Route::get('/registration', [WebsiteController::class, 'registration'])->name('registration');
Route::post('/registration_submit', [WebsiteController::class, 'registration_submit'])->name('registration_submit');

Route::get('/registration/verify/{token}/{email}', [WebsiteController::class, 'registration_verify']);

Route::get('/forget-password', [WebsiteController::class, 'forget_password'])->name('forget_password');
Route::post('/forget_password_submit', [WebsiteController::class, 'forget_password_submit'])->name('forget_password_submit');

Route::get('/reset-password/{token}/{email}', [WebsiteController::class, 'reset_password'])->name('reset_password');
Route::post('/reset_password_submit', [WebsiteController::class, 'reset_password_submit'])->name('reset_password_submit');


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('/insert', [ContactController::class, 'store'])->name('insert');