<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'discount',
    ];

    public function benefits()
    {
        return $this->hasMany(Benefit::class);
    }
}
