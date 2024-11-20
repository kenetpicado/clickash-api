<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'invoice' => 'No. ' . str_pad($this->id, 6, '0', STR_PAD_LEFT),
            'hour' => $this->hour,
            'total' => $this->total,
            'client' => $this->client,
            'raffle' => RaffleNameResource::make($this->whenLoaded('raffle')),
            'user' => UserNameResource::make($this->whenLoaded('user')),
            'items' => SaleItemResource::collection($this->whenLoaded('items')),
            'created_at' => $this->created_at->format('d/m/Y g:i A'),
        ];
    }
}
