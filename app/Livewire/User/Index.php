<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $users = User::latest()->has('company')->with('company')->get();

        return view('livewire.user.index', [
            'users' => $users
        ]);
    }
}
