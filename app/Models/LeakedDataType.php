<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeakedDataType extends Model
{
    public function breachEvents()
    {
        return $this->belongsToMany(
            BreachEvent::class,
            'breach_event_leaked_data_type',
            'leaked_data_type_id',
            'branch_event_id',
        )->withTimestamps();
    }
}
