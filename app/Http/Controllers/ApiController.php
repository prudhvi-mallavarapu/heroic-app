<?php

namespace App\Http\Controllers;

use App\Models\BreachEvent;

class ApiController extends Controller
{
    public function getIdentityRecords($identity)
    {
        $query = BreachEvent::query()->with([
            'identity:id,name',
            'source:id,name',
            'leakedDataTypes:id,type',
        ]);

        if ($identity !== 'all') {
            $query->whereHas('identity', function ($q) use ($identity) {
                $q->where('name', 'like', '%' . $identity . '%');
            });
        }

        $records = $query->get();

        return response()->json(['data' => $records]);
    }
}
