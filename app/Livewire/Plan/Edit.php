<?php

namespace App\Livewire\Plan;

use App\Livewire\Forms\BenefitForm;
use App\Livewire\Forms\PlanForm;
use App\Models\Benefit;
use App\Models\Plan;
use Livewire\Component;

class Edit extends Component
{
    public PlanForm $form;

    public BenefitForm $benefitForm;

    public Plan $plan;

    public function mount(Plan $plan)
    {
        $this->plan = $plan;
    }

    public function render()
    {
        $this->form->fill($this->plan);

        return view('livewire.plan.create');
    }

    public function submit()
    {
        $this->form->update($this->plan);
    }

    public function submitBenefit()
    {
        $this->benefitForm->plan_id = $this->plan->id;
        $this->benefitForm->store($this->plan);
    }

    public function deleteBenefit(Benefit $benefit)
    {
        $benefit->delete();
    }
}
