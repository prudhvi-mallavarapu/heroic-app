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
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    protected $scrollToTopOnPagination = false;
    protected $paginationPageName = 'eventsPage';

    // Reset page when filtering
    protected $updatesQueryString = ['selectedIdentity', 'search'];

    #[On('identityChanged')]
    public function updateMetrics($identity)
    {
        $this->selectedIdentity = $identity;
        $this->resetPage(); // reset pagination when filter changes
    }

    public function updatedSearch()
    {
        $this->resetPage();
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

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->whereHas('identity', function ($sub) {
                    $sub->where('name', 'like', '%' . $this->search . '%');
                })->orWhereHas('source', function ($sub) {
                    $sub->where('name', 'like', '%' . $this->search . '%');
                })->orWhere('endpoint', 'like', '%' . $this->search . '%')
                    ->orWhere('details', 'like', '%' . $this->search . '%');
            });
        }

        // Paginate dynamically
        $records = $query->orderBy('reported_on', 'desc')->paginate(10);

        return view('livewire.events-data-table', [
            'records' => $records,
            'totalRecords' => $records->total()
        ]);
    }
}
