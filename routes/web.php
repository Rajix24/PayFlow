<?php

use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;


// Route::delete('test/{id}', [WalletController::class, 'destory']);
Route::delete('test/{id}', [WalletController::class, 'destroy']);
// Route::get('wallet_delete/{wallet}', [WalletController::class, 'showToDelete'])->name('wallet_delete');
