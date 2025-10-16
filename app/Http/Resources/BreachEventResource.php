<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BreachEventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'source'        => $this->source,
            'reported_on'   => $this->reported_on,
            'severity'      => $this->severity,
            'status'        => $this->status,
            'endpoint'      => $this->endpoint,
            'details'       => $this->details,
            'identity'      => [
                'id'   => $this->identity->id,
                'name' => $this->identity->name,
            ],
            'leakedDataTypes' => $this->leakedDataTypes->map(function ($type) {
                return [
                    'id'   => $type->id,
                    'type' => $type->type,
                ];
            }),
        ];
    }
}
