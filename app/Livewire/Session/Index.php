<?php

namespace App\Livewire\Session;

use App\Models\Session;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $sessions = Session::with('user')->paginate();

        return view('livewire.session.index', [
            'sessions' => $sessions,
        ]);
    }
}
