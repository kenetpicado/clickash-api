<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CompanyPlan extends Pivot
{
    protected $table = 'company_plan';

    protected $fillable = [
        'id',
        'plan_id',
        'company_id',
        'users_limit',
        'payment_method',
        'reference',
        'discount',
        'price',
        'total',
        'status',
        'started_at',
        'expires_at',
        'paid_at',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'expires_at' => 'datetime',
        'paid_at' => 'datetime',
    ];
}
