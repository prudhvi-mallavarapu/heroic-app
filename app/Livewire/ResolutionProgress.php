<?php

namespace App\Livewire;

use App\Models\BreachEvent;
use Livewire\Component;
use Livewire\Attributes\On;

class ResolutionProgress extends Component
{
    public $selectedIdentity = 'all';
    public $totalRecords = 0;
    public $uniqueIdentities = 0;
    public $discoveredEndPoints = 0;
    public $totalSources = 0;
    public $resolvedCount = 0;
    public $unresolvedCount = 0;

    public function mount()
    {
        $this->loadMetrics(); // initialize with all
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
            COUNT(*) as total_records,
            COUNT(DISTINCT identity_id) as unique_identities,
            COUNT(DISTINCT endpoint) as discovered_endpoints,
            COUNT(DISTINCT source) as total_sources,
            SUM(status = "R") as resolved_count,
            SUM(status = "U") as unresolved_count
        ')->first();

        $this->totalRecords        = $aggregates->total_records ?? 0;
        $this->uniqueIdentities    = $aggregates->unique_identities ?? 0;
        $this->discoveredEndPoints = $aggregates->discovered_endpoints ?? 0;
        $this->totalSources        = $aggregates->total_sources ?? 0;
        $this->resolvedCount       = $aggregates->resolved_count ?? 0;
        $this->unresolvedCount     = $aggregates->unresolved_count ?? 0;
    }

    public function render()
    {
        return view('livewire.resolution-progress');
    }
}
