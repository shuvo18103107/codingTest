<?php


use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::post('process_document', [DashboardController::class, 'processDocument'])->name('process-document');
