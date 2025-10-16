<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class LeakedDataTypesChart extends Component
{
    public $chartData = [
        'labels' => [],
        'counts' => []
    ];
    public $totalRecords = 0;
    public $selectedIdentity = 'all';

    public function mount()
    {
        $this->loadChartData();
    }

    /**
     * Load chart data for all or specific identity
     */
    public function loadChartData($identity = 'all')
    {
        $query = DB::table('breach_event_leaked_data_type as pivot')
            ->join('leaked_data_types as types', 'types.id', '=', 'pivot.leaked_data_type_id');

        // Join breach_events only if filtering by identity
        if ($identity !== 'all') {
            $query->join('breach_events as events', 'events.id', '=', 'pivot.breach_event_id')
                ->where('events.identity_id', $identity);
        }

        // Aggregate counts per type
        $result = $query->select('types.type', DB::raw('COUNT(*) as count'))
            ->groupBy('types.type')
            ->get();

        $this->chartData = [
            'labels' => $result->pluck('type')->toArray(),
            'counts' => $result->pluck('count')->toArray()
        ];

        // Total records is sum of all counts
        $this->totalRecords = $result->sum('count');
    }

    /**
     * Update chart on identity change
     */
    #[On('identityChanged')]
    public function updateChart($identity)
    {
        $this->selectedIdentity = $identity;
        $this->loadChartData($identity);
        $this->dispatch('refreshLeakedChart', ['chartData' => $this->chartData]);
    }

    public function render()
    {
        return view('livewire.leaked-data-types-chart', [
            'chartData' => $this->chartData,
            'totalRecords' => $this->totalRecords
        ]);
    }
}
