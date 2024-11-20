<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LockResource extends JsonResource
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
            'value' => $this->value,
            'raffle' => RaffleNameResource::make($this->whenLoaded('raffle')),
            'user' => UserNameResource::make($this->whenLoaded('user')),
            'created_at' => $this->created_at->format('d/m/Y g:i A'),
        ];
    }
}
