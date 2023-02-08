<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return  redirect('login');
});

Auth::routes();

Route::middleware(['2fa'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('emailVerified', 'lastLogin', 'verifiedIp');
    Route::post('/2fa', function () {
        return redirect(route('home'));
    })->name('2fa');
});

Route::get('/complete-registration', [RegisterController::class, 'completeRegistration'])->name('complete.registration');
Route::view('/verificacion', 'verificacion')->name('verificacion');
Route::view('/sesiones', 'sesiones')->name('sesiones');
