<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['company_id', 'raffle_id', 'hour', 'value'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function raffle()
    {
        return $this->belongsTo(Raffle::class);
    }
}
