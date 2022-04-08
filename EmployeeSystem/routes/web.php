<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Management\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/forms', function () {
    return view('forms-element');
});

Route::get('/payroll', function () {
    return view('payroll');
});

Route::get('/', [EmployeeController::class, 'index2']);
Route::post('/add_data', [EmployeeController::class, 'empSave']);