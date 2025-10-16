<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class BreachedSourcesChart extends Component
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
        $query = DB::table('breach_events as events')
            ->join('sources as s', 's.id', '=', 'events.source_id');

        // Filter by identity if selected
        if ($identity !== 'all') {
            $query->where('events.identity_id', $identity);
        }

        // Aggregate counts per source
        $result = $query->select('s.name', DB::raw('COUNT(*) as count'))
            ->groupBy('s.name')
            ->get();

        $this->chartData = [
            'labels' => $result->pluck('name')->toArray(),
            'counts' => $result->pluck('count')->toArray(),
        ];

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
        $this->dispatch('refreshSourcesChart', ['chartData' => $this->chartData]);
    }

    public function render()
    {
        return view('livewire.breached-sources-chart', [
            'chartData' => $this->chartData,
            'totalRecords' => $this->totalRecords,
        ]);
    }
}
