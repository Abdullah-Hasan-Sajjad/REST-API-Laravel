<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'car_name'=>$this->car_name,
            'company_name'=>$this->company_name,
            'model'=>$this->model,
            'price'=>$this->price
        ];
    }
}
