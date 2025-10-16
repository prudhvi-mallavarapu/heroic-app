<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\BreachEvent;
use Livewire\Attributes\On;

class EventsDataTable extends Component
{
    use WithPagination;

    public $selectedIdentity = 'all';
    protected $paginationTheme = 'bootstrap';
    protected $scrollToTopOnPagination = false;

    // Reset page when filtering
    protected $updatesQueryString = ['selectedIdentity'];

    #[On('identityChanged')]
    public function updateMetrics($identity)
    {
        $this->selectedIdentity = $identity;
        $this->resetPage(); // reset pagination when filter changes
    }

    public function render()
    {
        $query = BreachEvent::query()
            ->with([
                'identity:id,name',
                'source:id,name',
                'leakedDataTypes:id,type'
            ]);

        if ($this->selectedIdentity !== 'all') {
            $query->where('identity_id', $this->selectedIdentity);
        }

        // Paginate dynamically
        $records = $query->orderBy('reported_on', 'desc')->paginate(10);

        return view('livewire.events-data-table', [
            'records' => $records,
            'totalRecords' => $records->count()
        ]);
    }
}
