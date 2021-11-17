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

Route::get('/admin', [DashboardController::class, 'index']);

Route::get('/admin/items', [ItemsController::class, 'index']);

Route::get('/admin/employees', [EmployeesController::class, 'index'])->name('employees.list');
Route::get('/admin/employees/create', [EmployeesController::class, 'create']);
Route::resource('/admin/employees/posts', EmployeesController::class);

Route::get('/admin/transactions', [HistoryController::class, 'index']);

Route::get('/admin/offices', [OfficesController::class, 'index']);

Route::get('/login', function () {
    return view('auth.login');
});
