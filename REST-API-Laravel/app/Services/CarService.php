<?php

namespace App\Services;

use App\Http\Resources\CarResource;
use App\Models\Car;

class CarService
{
    public function createCar($request): CarResource
    {
        $car = new Car;

        $car->car_name = $request->car_name;
        $car->company_name = $request->company_name;
        $car->model = $request->model;
        $car->price = $request->price;
        $car->save();

        return new CarResource($car);
    }
}
