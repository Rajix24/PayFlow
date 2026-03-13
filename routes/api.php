<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WalletController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::apiResource('wallet', WalletController::class);
Route::apiResource('currency', CurrencyController::class);
Route::get('wallet_delete/{wallet}', [WalletController::class, 'confornDelete']);
Route::get('cancel_delete/{id}', [WalletController::class, 'cancelDelete']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware("auth:sanctum");

// Route::middleware()
Route::post('wallet/{id}/deposit', [TransactionController::class, 'deposit']);
Route::post('wallet/{id}/withdraw', [TransactionController::class, 'withdraw']);
Route::post('wallet/{id}/transfer', [TransactionController::class, 'transfer']);
Route::get('wallet/{id}/transactions', [TransactionController::class, 'transactions']);