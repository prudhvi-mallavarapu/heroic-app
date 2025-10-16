<?php

namespace App\Livewire;

use App\Models\BreachEvent;
use Livewire\Component;

class EventsDataTable extends Component
{
    public function render()
    {
        $records = BreachEvent::with(['identity:id,name', 'leakedDataTypes:id,type'])->paginate(10);
        return view('livewire.events-data-table')->with(['records' => $records]);
    }
}
