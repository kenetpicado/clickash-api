<?php

namespace App\Livewire\Sale;

use App\Models\Sale;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $sales = Sale::query()
            ->latest()
            ->with(['raffle:id,name', 'user:id,name', 'company:id,name'])
            ->paginate(10);

        return view('livewire.sale.index', [
            'sales' => $sales
        ]);
    }
}
