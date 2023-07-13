<?php

namespace App\Http\Resources\CommandResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MobileCommandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'decisionTreeResult' => $this->decisionTreeResult,
        ];
    }
}
