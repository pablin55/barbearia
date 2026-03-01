<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

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
