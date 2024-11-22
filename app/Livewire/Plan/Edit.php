<?php

namespace App\Livewire\Plan;

use App\Livewire\Forms\PlanForm;
use App\Models\Plan;
use Livewire\Component;

class Edit extends Component
{
    public PlanForm $form;
    public Plan $plan;

    public function mount(Plan $plan)
    {
        $this->form->fill($plan);
        $this->plan = $plan;
    }

    public function render()
    {
        return view('livewire.plan.create');
    }

    public function submit()
    {
        $this->form->update($this->plan);

        return redirect()->route('dashboard.plans.index');
    }
}
