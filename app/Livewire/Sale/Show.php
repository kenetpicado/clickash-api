<?php

namespace App\Livewire\Sale;

use App\Models\Sale;
use Livewire\Component;

class Show extends Component
{
    public $sale;

    public function mount(Sale $sale)
    {
        $this->sale = $sale->load(['raffle:id,name', 'user:id,name', 'items']);
    }

    public function render()
    {
        return view('livewire.sale.show');
    }
}
