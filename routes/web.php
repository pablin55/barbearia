<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

// Language switcher
Route::get('/lang/{locale}', function (string $locale) {
    if (in_array($locale, ['pt', 'en', 'es'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');

// HOME
Route::view('/', 'index')->name('home');

// SERVIÇOS
Route::view('/servicos', 'servicos')->name('servicos');

// EQUIPE
Route::view('/equipe', 'equipe')->name('equipe');

// LOGIN
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// REGISTRO
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// LOGOUT
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
