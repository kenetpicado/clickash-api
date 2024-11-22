<?php

namespace App\Livewire\Plan;

use App\Livewire\Forms\BenefitForm;
use App\Models\Benefit;
use App\Models\Plan;
use Livewire\Component;

class Show extends Component
{
    public BenefitForm $form;
    public $plan;

    public function mount(Plan $plan)
    {
        $this->plan = $plan->load(['benefits']);
    }

    public function render()
    {
        return view('livewire.plan.show');
    }

    public function submit()
    {
        $this->form->plan_id = $this->plan->id;
        $this->form->store();
    }

    public function delete(Benefit $benefit)
    {
        $benefit->delete();
    }
}
