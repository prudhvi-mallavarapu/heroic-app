<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeakedDataType extends Model
{
    const DataTypeIcons = [
        'Emails' => 'far fa-envelope',
        'Usernames' => 'fas fa-lock',
        'Passwords' => 'fas fa-key',
        'PW-hash' => 'fas fa-hashtag',
        'IP-add' => 'fas fa-map-pin',
        'Phones' => 'fas fa-phone',
        'SSN' => 'fas fa-id-card',
        'Banking' => 'fas fa-money-check-alt',
        'Bitcoin' => 'fab fa-bitcoin'
    ];

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
