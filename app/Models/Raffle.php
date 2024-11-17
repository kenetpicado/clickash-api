<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Raffle extends Model
{
    protected $fillable = [
        'name',
        'description',
        'background_color',
        'is_date',
        'min',
        'max',
        'individual_limit',
        'general_limit',
        'multiplier',
        'schedule',
        'company_id',
    ];

    protected $casts = [
        'schedule' => 'array',
        'is_date' => 'boolean',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
