<?php

namespace App\Livewire\Plans;

use App\Models\Plan;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $plans = Plan::all();

        return view('livewire.plans.index', [
            'plans' => $plans
        ]);
    }
}
