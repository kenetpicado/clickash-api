<?php

namespace App\Livewire\Forms;

use App\Models\Plan;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PlanForm extends Form
{
    #[Validate('required')]
    public $name = '';

    #[Validate('nullable')]
    public $description = '';

    #[Validate('required|numeric|min:0')]
    public $price = 0;

    #[Validate('required|numeric|min:0')]
    public $discount = 0;

    public function store()
    {
        $this->validate();

        Plan::create($this->all());

        $this->reset();
    }

    public function update(Plan $plan)
    {
        $this->validate();

        $plan->update($this->all());

        $this->reset();
    }
}
