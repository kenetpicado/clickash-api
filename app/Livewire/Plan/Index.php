<?php

namespace App\Livewire\Plan;

use App\Livewire\Forms\PlanForm;
use App\Models\Plan;
use Livewire\Component;

class Index extends Component
{
    public PlanForm $form;

    public function render()
    {
        $plans = Plan::all();

        return view('livewire.plan.index', [
            'plans' => $plans
        ]);
    }

    public function submit()
    {
        $this->form->store();
    }
}
