<?php

use App\Http\Controllers\CoaCategoryController;
use App\Http\Controllers\CoaController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

// Resource Routes untuk CRUD
Route::resource('coa-categories', CoaCategoryController::class);
Route::resource('coas', CoaController::class);
Route::resource('transactions', TransactionController::class);

// Laporan
Route::get('/reports/profit-loss', [ReportController::class, 'profitLoss'])->name('reports.profit-loss');
Route::get('/reports/export-excel', [ReportController::class, 'exportExcel'])->name('reports.export-excel');

// routes/web.php
Route::get('/reports/export-excel/{year}', [ReportController::class, 'exportExcel'])
    ->name('reports.export-excel');
