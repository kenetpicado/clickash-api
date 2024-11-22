<?php

namespace App\Livewire\Forms;

use App\Models\Benefit;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BenefitForm extends Form
{
    #[Validate('required')]
    public $name = '';

    #[Validate('required')]
    public $plan_id = 0;

    public function store()
    {
        $this->validate();

        Benefit::create($this->all());

        $this->reset();
    }

    public function update(Benefit $benefit)
    {
        $this->validate();

        $benefit->update($this->all());

        $this->reset();
    }
}
