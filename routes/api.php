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
Route::post('wallets/{id}/deposit', [TransactionController::class, 'deposit']);
Route::post('wallets/{id}/deposit', [TransactionController::class, 'withdraw']);
Route::post('wallets/{id}/deposit', [TransactionController::class, 'transfer']);
Route::get('wallets/{id}/deposit', [TransactionController::class, 'transactions']);