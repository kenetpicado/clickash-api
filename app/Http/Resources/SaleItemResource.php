<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleItemResource extends JsonResource
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
            'amount' => $this->amount,
            'super_x' => $this->super_x,
            'total' => $this->total,
            'status' => $this->status,
            'prize' => $this->prize,
            'sale' => SaleResource::make($this->whenLoaded('sale')),
        ];
    }
}
