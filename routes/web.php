<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LembagaController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\PreviewPageController;

// Route untuk halaman login
Route::get('/', function () {
    return view('auth.login');
});

// Route untuk halaman register
Route::get('/register', function () {
    return view('auth.register');
});

// Route middleware untuk autentikasi
Route::middleware(['auth', 'verified'])->group(function () {
    // Route untuk dashboard dengan controller
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Route untuk profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route untuk input_form
    Route::get('/input_form/{lembaga_id}', [ArsipController::class, 'showForm'])->name('input_form');
    Route::post('/input_form', [ArsipController::class, 'store'])->name('input_form_submit');

    // Route untuk data_view
    Route::get('/data_view/{lembaga_id}', [ArsipController::class, 'showDataView'])->name('data_view_lembaga');
    Route::get('/data_view', [ArsipController::class, 'dataView'])->name('data_view');
    

    // Route untuk edit_data
    Route::get('/edit_data/{id}', [ArsipController::class, 'edit'])->name('edit_data');
    Route::put('/edit_data/{id}', [ArsipController::class, 'update'])->name('arsip.update');
    Route::delete('/edit_data/{id}', [ArsipController::class, 'destroy'])->name('arsip.destroy');
    
    // Route untuk history
    Route::get('/history', [ArsipController::class, 'history'])->name('history');

    Route::resource('lembaga', LembagaController::class);
    Route::get('/lembaga', [LembagaController::class, 'create'])->name('input_lembaga');
    Route::delete('/lembaga/{id}', [LembagaController::class, 'destroy'])->name('lembaga.destroy');
    Route::post('/lembaga', [LembagaController::class, 'store'])->name('lembaga.store');
    Route::get('/dataview_admin', [DashboardController::class, 'data_admin'])->name('data_admin');

    Route::get('/export/{lembaga_id}', [ExportController::class, 'export'])->name('export_arsip');
    Route::get('/preview/{id}', [ExportController::class, 'preview'])->name('preview');

 

});

// Auth routes
require __DIR__.'/auth.php';

