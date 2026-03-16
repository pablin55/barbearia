<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\AgendamentoController;

// ============================================
// TROCADOR DE IDIOMA
// Permite ao usuário mudar o idioma do site
// ============================================
Route::get('/lang/{locale}', function (string $locale) {
    // Verifica se o idioma é válido (pt, en, es)
    if (in_array($locale, ['pt', 'en', 'es'])) {
        // Salva o idioma na sessão
        session()->put('locale', $locale);
    }
    // Retorna para a página anterior
    return redirect()->back();
})->name('lang.switch');

// ============================================
// PÁGINA INICIAL (HOME)
// ============================================
Route::view('/', 'index')->name('home');

// ============================================
// PÁGINA DE SERVIÇOS
// Exibe todos os serviços disponíveis
// ============================================
Route::view('/servicos', 'servicos')->name('servicos');

// ============================================
// PÁGINA DA EQUIPE
// Exibe os profissionais da barbearia
// ============================================
Route::view('/equipe', 'equipe')->name('equipe');

// ============================================
// PÁGINA DE AGENDAMENTO
// Formulário para agendamento de horários
// ============================================

// Rota GET: Exibe o formulário de agendamento
Route::get('/agendamento', [AgendamentoController::class, 'create'])->name('agendamento');

// Rota POST: Processa o formulário de agendamento
Route::post('/agendamento', [AgendamentoController::class, 'store'])->name('agendamento.store');

Route::get('/verificar-horario', [AgendamentoController::class, 'verificarHorario']);

