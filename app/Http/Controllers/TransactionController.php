<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Models\Transaction;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function deposit()
    {
        return "api";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function withdraw(StoreTransactionRequest $request)
    {
        return "api";
    }

    /**
     * Display the specified resource.
     */
    public function transfer(Transaction $transaction)
    {
        return "api";
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function transactions(StoreTransactionRequest $request, Transaction $transaction)
    {
        return "api";
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        return "api";
        
    }
}
