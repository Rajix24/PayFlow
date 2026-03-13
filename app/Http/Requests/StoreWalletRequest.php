<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreWalletRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'currency_id' => 'required|exists:currencies,id',
            'balance' => 'required|numeric|min:0'
        ];
    }
    public function messages(): array
    {
        return [
            'balance.required' => 'Balance plase enter some mony to your account',
            'balance.numeric' => 'wanta 5sso ikon number',

            'user_id.required' => 'User is required',
            'user_id.exists' => 'User does not exist',

            'currency_id.required' => 'Please choose a currency',
            'currency_id.exists' => 'Currency not found'
        ];
    }
    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $errors = $validator->errors();
        $response = response()->json([
            "success" => false,
            'message' => 'Erreur de validation',
            'error' => $errors->messages(),
        ], 422);
        throw new HttpResponseException($response);
    }
}












