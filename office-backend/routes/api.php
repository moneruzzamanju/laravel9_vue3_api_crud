<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;


Route::get('/employees',[App\Http\Controllers\EmployeeController::class, 'index']);

Route::post('/employees',[App\Http\Controllers\EmployeeController::class, 'store']);

Route::put('/employees/{id}',[App\Http\Controllers\EmployeeController::class, 'update']);

Route::delete('/employees/{id}',[App\Http\Controllers\EmployeeController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('employees', EmployeeController::class);
