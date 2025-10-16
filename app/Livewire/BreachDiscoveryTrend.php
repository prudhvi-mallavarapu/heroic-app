<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class BreachDiscoveryTrend extends Component
{
    public $chartData = [
        'labels' => [],
        'counts' => []
    ];

    public $selectedIdentity = 'all';

    public function mount()
    {
        $this->loadChartData();
    }

    /**
     * Load breach counts by reported_on date
     */
    public function loadChartData($identity = 'all')
    {
        $query = DB::table('breach_events');

        if ($identity !== 'all') {
            $query->where('identity_id', $identity);
        }

        $result = $query->select(
            DB::raw('DATE(reported_on) as date'),
            DB::raw('COUNT(*) as count')
        )
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $this->chartData = [
            'labels' => $result->pluck('date')->toArray(),
            'counts' => $result->pluck('count')->toArray()
        ];
    }

    /**
     * Update chart dynamically for a specific identity
     */
    public function updateChart($identity)
    {
        $this->selectedIdentity = $identity;
        $this->loadChartData($identity);

        $this->dispatch('refreshBreachTrendChart', [
            'chartData' => $this->chartData
        ]);
    }

    public function render()
    {
        return view('livewire.breach-discovery-trend', [
            'chartData' => $this->chartData
        ]);
    }
}
