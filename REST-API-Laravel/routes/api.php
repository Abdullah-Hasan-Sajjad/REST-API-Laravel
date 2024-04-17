<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\CarController;
use \App\Http\Controllers\AuthenticationController;

Route::post('/login', [AuthenticationController::class, 'login']);

//Route::apiResource('/cars', CarController::class);
Route::middleware('auth:sanctum')
    ->apiResource('/cars', CarController::class);


//$token = $user->createToken('token-name')->plainTextToken;
