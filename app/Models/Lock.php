<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lock extends Model
{
    protected $fillable = [
        'company_id',
        'raffle_id',
        'user_id',
        'value',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function raffle()
    {
        return $this->belongsTo(Raffle::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
