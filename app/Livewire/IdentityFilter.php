<?php

namespace App\Livewire;

use App\Models\Identity;
use Livewire\Component;

class IdentityFilter extends Component
{
    public function render()
    {
        $identities = Identity::select('name', 'type')->get();
        return view('livewire.identity-filter')->with(['identities' => $identities]);
    }
}
