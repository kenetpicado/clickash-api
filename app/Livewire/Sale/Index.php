<?php

namespace App\Livewire\Sale;

use App\Models\Company;
use App\Models\Sale;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $company_id;
    public $raffle_id;

    public function render()
    {
        $sales = Sale::query()
            ->latest()
            ->when(
                $this->company_id,
                fn($query) => $query->where('company_id', $this->company_id)
            )
            ->when(
                $this->raffle_id,
                fn($query) => $query->where('raffle_id', $this->raffle_id)
            )
            ->with(['raffle:id,name', 'user:id,name', 'company:id,name'])
            ->paginate(10);

        return view('livewire.sale.index', [
            'sales' => $sales,
            'companies' => Company::query()
                ->select('id', 'name')
                ->with('raffles:id,name,company_id')
                ->get()
        ]);
    }
}
