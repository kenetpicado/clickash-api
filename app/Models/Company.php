<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'status', 'workspace_code', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function raffles()
    {
        return $this->hasMany(Raffle::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function hasThisRaffle($raffle_id)
    {
        return $this->raffles()->where('id', $raffle_id)->exists();
    }

    public function imOwner()
    {
        return $this->user_id === auth()->id();
    }
}
