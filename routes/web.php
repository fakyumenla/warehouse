<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\OfficesController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\TypeController;
use App\Models\History_ownership;
use App\Models\Region;
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

Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/admin/items', [ItemsController::class, 'index'])->name('items.list');
Route::get('/admin/items/create', [ItemsController::class, 'create'])->name('items.create');
Route::get('admin/items/{name}/{id}', [ItemsController::class, 'show'])->name('items.details');
Route::resource('/admin/items/posts', ItemsController::class);

Route::get('/admin/employees', [EmployeesController::class, 'index'])->name('employees.list');
Route::get('/admin/employees/create', [EmployeesController::class, 'create'])->name('employees.create');
Route::resource('/admin/employees/posts', EmployeesController::class);
Route::delete('/admin/employees/delete/{id}',[EmployeesController::class, 'destroy'])->name('employees.destroy');


Route::get('/admin/regions', [RegionController::class, 'index'])->name('regions.list');
Route::get('/admin/regions/create', [RegionController::class, 'create'])->name('regions.create');
Route::resource('/admin/regions/posts', RegionController::class);

Route::get('/admin/types', [TypeController::class, 'index'])->name('types.list');
Route::get('/admin/types/create', [TypeController::class, 'create'])->name('types.create');
Route::resource('/admin/types/posts', TypeController::class);

Route::get('/admin/histories', [HistoryController::class, 'index'])->name('histories.list');
Route::get('/admin/Transaction/create', [HistoryController::class, 'create'])->name('histories.create');
Route::resource('/admin/Transaction/posts', HistoryController::class);

Route::get('/admin/offices', [OfficesController::class, 'index'])->name('offices.list');
Route::get('/admin/offices/create', [OfficesController::class, 'create'])->name('offices.create');
Route::resource('/admin/offices/posts', OfficesController::class);

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('getOffice/{id}', function ($id) {
    $office = App\Models\Office::where('region_id', $id)->get();
    return response()->json($office);
});

Route::get('ajax-autocomplete-search', [HistoryController::class, 'selectSearch']);
Route::get('ajax-autocomplete-search-item', [HistoryController::class, 'selectSearch_item']);
