<?php

namespace App\Livewire\Plan;

use App\Models\Plan;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $plans = Plan::all();

        return view('livewire.plan.index', [
            'plans' => $plans
        ]);
    }
}
