<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorecurrencyRequest;
use App\Http\Requests\UpdatecurrencyRequest;
use App\Http\Resources\CurrencyResource;
use App\Models\Currency;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currencies =  Currency::all();
        return ['data' => CurrencyResource::collection($currencies)];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecurrencyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(currency $currency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecurrencyRequest $request, currency $currency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(currency $currency)
    {
        //
    }
}
