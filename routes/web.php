<?php

use App\Http\Controllers\CalculatorController;
use App\Models\Fuel;
use App\Models\Unit;
use App\Models\Year;
use App\Models\Facilty;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DropdownController;

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

Route::get('/', [CalculatorController::class, 'getPage']);
Route::post('/calculate', [CalculatorController::class, 'calculate']);
Route::post('/store', [CalculatorController::class, 'store']);
Route::post('/delete', [CalculatorController::class, 'delete']);
Route::post('/update', [CalculatorController::class, 'update']);
Route::get('/datatable', [CalculatorController::class, 'datatable']);
Route::post('/getSingle', [CalculatorController::class, 'getSingle']);





// Route::get('/dropdowns/facilty', [DropdownController::class, 'getFacilty']);