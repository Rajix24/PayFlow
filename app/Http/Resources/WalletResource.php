<?php

namespace App\Http\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
            return [
                'id' =>$this->id,
                "user_id" => $this->user_id,
                'balance' =>$this->balance,
                "currency" => new CurrencyResource($this->whenLoaded('currency')),
                // 'user' => new UserResource($this->whenLoaded('user')),
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ];
                 
    }
    public function paginationInformation($request, $paginated, $default)
{
    $default['links']['custom'] = 'https://localhost:8000/api/';
 
    return $default;
}
}
