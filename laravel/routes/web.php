<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\RecomendacionController;

Route::get('/', [CampusController::class, 'home'])->name('home');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::resource('documentos', DocumentoController::class);
Route::resource('recomendaciones', RecomendacionController::class)->parameters(['recomendaciones' => 'herramienta']);
Route::get('/historial', [CampusController::class, 'historial'])->name('historial');
