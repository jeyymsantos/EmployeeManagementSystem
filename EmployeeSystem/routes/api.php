<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Management\EmployeeController;
use App\Http\Controllers\Management\PayrollController;

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

// Employee API Routes
Route::get('management/employee', [EmployeeController::class, 'index']);
Route::get('management/employee/{id}', [EmployeeController::class, 'show']);
Route::post('management/employee', [EmployeeController::class, 'store']);
Route::put('management/employee/{employee}', [EmployeeController::class, 'update']);
Route::delete('management/employee/{employee}', [EmployeeController::class, 'destroy']);

// Payroll API Routes
Route::post('management/employee/{id}/timein', [PayrollController::class, 'addTimeIn']);
Route::post('management/employee/{id}/timeout', [PayrollController::class, 'addTimeOut']);