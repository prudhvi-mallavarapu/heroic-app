<?php

namespace App\Livewire;

use App\Models\Identity;
use Livewire\Component;

class IdentityFilter extends Component
{
    public $identities = [];
    public $selectedIdentity = '';

    public function mount()
    {
        $this->identities = Identity::select('id', 'name', 'type')->get();
    }

    public function updatedSelectedIdentity($value)
    {
        // Dispatch event to other components
        $this->dispatch('identityChanged', identity: $value);
    }

    public function render()
    {
        return view('livewire.identity-filter');
    }
}
