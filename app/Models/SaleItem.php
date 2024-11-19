<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    protected $fillable = [
        'sale_id',
        'value',
        'amount',
        'super_x',
        'total',
        'status',
        'hour',
        'prize',
    ];

    protected $casts = [
        'super_x' => 'boolean',
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
