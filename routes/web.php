<?php

use Illuminate\Support\Facades\Route;

// HOME
Route::view('/', 'index')->name('home');

// SERVIÇOS
Route::view('/servicos', 'servicos')->name('servicos');

// EQUIPE
Route::view('/equipe', 'equipe')->name('equipe');
