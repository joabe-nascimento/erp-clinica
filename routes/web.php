<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use Barryvdh\DomPDF\Facade as PDF;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('pacientes', PacienteController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Exemplo de rotas
Route::get('/pacientes', [PacienteController::class, 'index'])->name('pacientes.index');
Route::get('/pacientes/create', [PacienteController::class, 'create'])->name('pacientes.create');
Route::post('/pacientes', [PacienteController::class, 'store'])->name('pacientes.store');
// Rota de exportação (PDF, CSV)
Route::get('pacientes/export/{type}', [PacienteController::class, 'export'])
     ->name('pacientes.export');

