<?php

namespace App\Livewire\PersonalAccessToken;

use App\Models\PersonalAccessToken;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $personalAccessTokens = PersonalAccessToken::with('tokenable')->latest()->paginate();

        return view('livewire.personal-access-token.index', [
            'personalAccessTokens' => $personalAccessTokens,
        ]);
    }
}
