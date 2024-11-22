<?php

namespace App\Livewire\Plan;

use App\Livewire\Forms\PlanForm;
use Livewire\Component;

class Create extends Component
{
    public PlanForm $form;

    public function render()
    {
        return view('livewire.plan.create');
    }

    public function submit()
    {
        $this->form->store();

        return redirect()->route('dashboard.plans.index');
    }
}
