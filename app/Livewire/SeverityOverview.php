<?php

namespace App\Livewire;

use App\Models\BreachEvent;
use Livewire\Attributes\On;
use Livewire\Component;

class SeverityOverview extends Component
{
    public $selectedIdentity = 'all';

    // Store unresolved / total per severity
    public $critical = ['unresolved' => 0, 'total' => 0];
    public $high     = ['unresolved' => 0, 'total' => 0];
    public $moderate = ['unresolved' => 0, 'total' => 0];
    public $low      = ['unresolved' => 0, 'total' => 0];

    public function mount()
    {
        $this->loadMetrics();
    }

    #[On('identityChanged')]
    public function updateMetrics($identity)
    {
        $this->selectedIdentity = $identity;
        $this->loadMetrics($identity);
    }

    private function loadMetrics($identity = 'all')
    {
        $query = BreachEvent::query();

        if ($identity !== 'all') {
            $query->where('identity_id', $identity);
        }

        $aggregates = $query->selectRaw('
            SUM(severity = "C") as critical_total,
            SUM(severity = "C" AND status = "U") as critical_unresolved,
            SUM(severity = "H") as high_total,
            SUM(severity = "H" AND status = "U") as high_unresolved,
            SUM(severity = "M") as moderate_total,
            SUM(severity = "M" AND status = "U") as moderate_unresolved,
            SUM(severity = "L") as low_total,
            SUM(severity = "L" AND status = "U") as low_unresolved
        ')->first();

        $this->critical = [
            'unresolved' => $aggregates->critical_unresolved ?? 0,
            'total'      => $aggregates->critical_total ?? 0,
        ];

        $this->high = [
            'unresolved' => $aggregates->high_unresolved ?? 0,
            'total'      => $aggregates->high_total ?? 0,
        ];

        $this->moderate = [
            'unresolved' => $aggregates->moderate_unresolved ?? 0,
            'total'      => $aggregates->moderate_total ?? 0,
        ];

        $this->low = [
            'unresolved' => $aggregates->low_unresolved ?? 0,
            'total'      => $aggregates->low_total ?? 0,
        ];
    }

    public function render()
    {
        return view('livewire.severity-overview');
    }
}
