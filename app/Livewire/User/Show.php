<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user->load(['company.raffles', 'company.users', 'company.plans']);
    }

    public function render()
    {
        return view('livewire.user.show');
    }
}
