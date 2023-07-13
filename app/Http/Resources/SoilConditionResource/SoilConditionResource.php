<?php

namespace App\Http\Resources\SoilConditionResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SoilConditionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'temperature' => $this->temperature,
            'moisture' => $this->moisture,
        ];
    }
}
