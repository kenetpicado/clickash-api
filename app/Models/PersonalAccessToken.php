<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalAccessToken extends Model
{
    protected $casts = [
        'last_used_at' => 'datetime',
    ];

    public function tokenable()
    {
        return $this->morphTo();
    }
}
