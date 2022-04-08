<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Management\EmployeeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Get All Data
Route::get('management/employee', [EmployeeController::class, 'index']);

// Get Data by ID
Route::get('management/employee/{id}', [EmployeeController::class, 'show']);

//POST Data
Route::post('management/employee', [EmployeeController::class, 'store']);

//PUT Data
Route::put('management/employee/{employee}', [EmployeeController::class, 'update']);

//DELETE Data
Route::delete('management/employee/{employee}', [ContactControllerAPI::class, 'destroy']);