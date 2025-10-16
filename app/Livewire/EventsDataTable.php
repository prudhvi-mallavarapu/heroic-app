<?php

namespace App\Livewire;

use Livewire\WithPagination;
use App\Models\BreachEvent;
use Livewire\Component;

class EventsDataTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $scrollToTopOnPagination = false;

    public function render()
    {
        $records = BreachEvent::with(['identity:id,name', 'leakedDataTypes:id,type'])->paginate(5);
        return view('livewire.events-data-table')->with(['records' => $records]);
    }
}
