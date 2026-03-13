<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWalletRequest;
use App\Http\Requests\UpdateWalletRequest;
use App\Http\Resources\WalletResource;
use App\Models\Delete;
use App\Models\Wallet;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $wallets = Wallet::with('user', 'currency')->get();
        return response()->json([
            'success' => true,
            'message' => 'data is successfully return',
            'data' => WalletResource::collection(Wallet::with('user', 'currency')->get())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWalletRequest $request)
    {
        $wallet = Wallet::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'wallet has been created',
            'data' => new WalletResource($wallet),
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Wallet $wallet)
    {
        return response()->json([
            "success" => true,
            "message" => 'wallet has been created',
            "data" => new WalletResource($wallet)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWalletRequest $request, Wallet $wallet)
    {
        $validated = $request->validated();
        $wallet->update($validated);
        return response()->json([
            'success' => true,
            'message' => 'wallet has been updated',
            'data' => new WalletResource($wallet),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $delete = Delete::find($id)->first();
        if (Carbon::now()->greaterThan($delete->expires_at)) {
            $delete->delete();
            return response()->json([
                'status' => false,
                'message' => 'error token expired'
            ]);
        }
        if ($delete->token !== $request->token) {
            return response()->json([
                'status' => false,
                'message' => 'error token that you enter is wrong'
            ]);
        }
        $walletnum = $delete->wallet_id;
        $wallet = Wallet::where('id', '=', $walletnum)->first();
        // return $wallet;
        $wallet->delete();
        $delete->delete();
        return response()->json([
            'success' => true,
            'message' => 'Your Walite has been remove'
        ]);
    }

    public function confornDelete(Wallet $wallet)
    {
        $token = Str::random(10);
        $delete = Delete::create([
            'token' => $token,
            'user_id' => $wallet->user->id,
            'wallet_id' => $wallet->id,
            'expires_at' => Carbon::now()->addHour(),
        ]);
        return response()->json([
            'success' => true,
            'message' => "are you sur to Delete wallet! writh this toker down",
            'token' => $delete->token,
            'token_id' => $delete->id,
            'data' => $wallet
        ]);
    }
    public function cancelDelete($id){
        $delete = Delete::find($id)->first();
        $delete->delete();
        return response()->json([
            'success' => true,
            'message' => 'cancel delete of wallet',
        ]);
    }
}
