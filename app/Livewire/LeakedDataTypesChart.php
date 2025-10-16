<?php

namespace App\Livewire;

use App\Models\LeakedDataType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class LeakedDataTypesChart extends Component
{
    public function render()
    {
        $records = DB::table('leaked_data_types')->get();
        return view('livewire.leaked-data-types-chart')->with(['records' => $records]);
    }
}
