<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResultResource extends JsonResource
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
            'hour' => $this->hour,
            'value' => $this->value,
            'raffle' => RaffleNameResource::make($this->whenLoaded('raffle')),
            'created_at' => $this->created_at->format('d/m/Y g:i A'),
        ];
    }
}
