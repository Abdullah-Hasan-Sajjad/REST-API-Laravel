<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Services\CarService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():object
    {
        $cars =  CarResource::collection(Car::all());
        return response()->json([
            'status' => true,
            'data' => $cars,
            'message' => 'Success']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request): JsonResponse
    {
        try {
            $car = (new CarService())->createCar($request);
            return response()->json(['status' => true, 'data' => $car, 'message' => 'Car info created'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => false,'data' => '','message' => 'Can not create car info'], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car): JsonResponse
    {
        try {
            $details = new CarResource($car);
            return response()->json(['status' => true, 'data' => $details, 'message' => 'success']);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'data' => '',
                //'message' => $th->getMessage()
                'message' => 'error occurred'
            ], 422);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, Car $car): JsonResponse
    {
        try {
            $car->update($request->validated());
            return response()->json([
                'status' => true,
                'data' => $car,
                'message' => 'Successfully updated']);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'data' => '',
                //'message' => $th->getMessage()
                'message' => 'error occurred'
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car): JsonResponse
    {
        try {
            $car->delete();
            return response()->json([
                'status' => true,
                'data' => $car,
                'message' => 'Deleted successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'data' => '',
                //'message' => $th->getMessage()
                'message' => 'error occurred'
            ], 422);
        }
    }
}
