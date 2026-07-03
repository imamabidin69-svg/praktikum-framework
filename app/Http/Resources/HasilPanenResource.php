<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HasilPanenResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'commodity' => strtoupper($this->commodity_name), // Transformasi data
            'weight' => $this->weight_kg . ' kg',
            'harvested_at' => $this->harvest_date,
            'created_format' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}