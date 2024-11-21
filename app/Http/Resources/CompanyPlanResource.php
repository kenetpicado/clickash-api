<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyPlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'summary' => 'Este plan incluye capacidad para ' . $this->users_limit . ' usuarios, desde ' . $this->started_at->format('d/m/Y') . ' hasta ' . $this->expires_at->format('d/m/Y'),
            'current' => Carbon::now()->between($this->started_at, $this->expires_at),
            'users_limit' => $this->users_limit,
            'payment_method' => $this->payment_method,
            'reference' => $this->reference,
            'discount' => $this->discount,
            'price' => $this->price,
            'total' => $this->total,
            'status' => $this->status,
            'started_at' => $this->started_at->format('d/m/Y g:i A'),
            'expires_at' => $this->expires_at->format('d/m/Y g:i A'),
            'paid_at' => $this->paid_at ? $this->paid_at->format('d/m/Y g:i A') : null,
            'created_at' => $this->created_at->format('d/m/Y g:i A'),
        ];
    }
}
