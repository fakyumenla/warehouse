<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\OfficesController;
use App\Http\Controllers\TransactionsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index']);

Route::get('/items', [ItemsController::class, 'index']);

Route::get('/employees', [EmployeesController::class, 'index']);
Route::get('/employees/add', [EmployeesController::class, 'create']);

Route::get('/transactions', [HistoryController::class, 'index']);

Route::get('/offices', [OfficesController::class, 'index']);

Route::get('/login', function () {
    return view('auth.login');
});
