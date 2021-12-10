<?php

use App\Models\Office;
use App\Models\Region;
use App\Models\History_ownership;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\OfficesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeesController;
// use App\Http\Controllers\Items_userController;
use App\Http\Controllers\ItemsUserController;
use App\Http\Controllers\TransactionsController;

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
Route::get('/', function () {
    return redirect('/admin');
});

Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/admin/items', [ItemsController::class, 'index'])->name('items.list')->middleware('auth');
Route::get('/admin/items/create', [ItemsController::class, 'create'])->name('items.create')->middleware('auth');
Route::get('admin/items/{name}/{id}', [ItemsController::class, 'show'])->name('items.details')->middleware('auth');
Route::resource('/admin/items/posts', ItemsController::class);
Route::put('admin/items/edits/posts/{id}', [ItemsController::class, 'update'])->name('items.update');
Route::get('admin/items/edits/edit/{id}', [ItemsController::class, 'edit'])->name('items.edit');
Route::delete('/admin/items/delete/{id}',[ItemsController::class, 'destroy'])->name('items.destroy');

Route::get('item/{name}/{id}', [ItemsUserController::class, 'show'])->name('items.details.user');


Route::get('/admin/employees', [EmployeesController::class, 'index'])->name('employees.list')->middleware('auth');
Route::get('/admin/employees/create', [EmployeesController::class, 'create'])->name('employees.create')->middleware('auth');

Route::put('admin/employees/posts/{id}', [EmployeesController::class, 'update'])->name('employees.update')->middleware('auth');
Route::get('admin/employees/edit/{id}', [EmployeesController::class, 'edit'])->name('employees.edit')->middleware('auth');
Route::delete('/admin/employees/delete/{id}',[EmployeesController::class, 'destroy'])->name('employees.destroy')->middleware('auth');
Route::resource('/admin/employees/posts', EmployeesController::class)->names([
    'index' => 'employees.list',
    'create' => 'employees.create',
    'store' =>  'employees.store',
    'edit' => 'employees.edit',
    'update' => '.update',
    'destroy' => 'offices.destroy'
])->middleware('auth');


Route::get('/admin/regions', [RegionController::class, 'index'])->name('regions.list')->middleware('auth');
Route::get('/admin/regions/create', [RegionController::class, 'create'])->name('regions.create')->middleware('auth');
Route::resource('/admin/regions/posts', RegionController::class)->middleware('auth');
Route::put('admin/regions/posts/{id}', [RegionController::class, 'update'])->name('regions.update');
Route::get('admin/regions/edit/{id}', [RegionController::class, 'edit'])->name('regions.edit');
Route::delete('/admin/regions/delete/{id}',[RegionController::class, 'destroy'])->name('regions.destroy');

Route::get('/admin/types', [TypeController::class, 'index'])->name('types.list')->middleware('auth');
Route::get('/admin/types/create', [TypeController::class, 'create'])->name('types.create')->middleware('auth');
Route::resource('/admin/types/posts', TypeController::class);
Route::put('admin/types/posts/{id}', [TypeController::class, 'update'])->name('types.update');
Route::get('admin/types/edit/{id}', [TypeController::class, 'edit'])->name('types.edit');
Route::delete('/admin/types/delete/{id}',[TypeController::class, 'destroy'])->name('types.destroy');

Route::get('/admin/histories', [HistoryController::class, 'index'])->name('histories.list')->middleware('auth');
Route::get('/admin/Transaction/create', [HistoryController::class, 'create'])->name('histories.create')->middleware('auth');
Route::resource('/admin/Transaction/posts', HistoryController::class);
Route::get('/admin/Transaction/edit/{id}', [HistoryController::class, 'edit'])->name('histories.edit');
Route::put('/admin/Transaction/posts/{id}', [HistoryController::class, 'update'])->name('histories.update');
Route::delete('/admin/Transaction/delete/{id}',[HistoryController::class, 'destroy'])->name('histories.destroy');


// Route::get('/admin/offices', [OfficesController::class, 'index'])->name('offices.list')->middleware('auth');
// Route::get('/admin/offices/create', [OfficesController::class, 'create'])->name('office.create')->middleware('auth');
// Route::put('admin/offices/posts/{id}', [OfficesController::class, 'update'])->name('offices.update');
// Route::get('admin/offices/edit/{id}', [OfficesController::class, 'edit'])->name('offices.edit');
// Route::delete('/admin/offices/delete/{id}',[OfficesController::class, 'destroy'])->name('offices.destroy');
Route::resource('/admin/offices', OfficesController::class)->names([
    'index' => 'offices.list',
    'create' => 'offices.create',
    'store' =>  'offices.store',
    'edit' => 'offices.edit',
    'update' => 'offices.update',
    'destroy' => 'offices.destroy'
])->middleware('auth');


Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('welcome.login');
Route::post('/logout ', [LoginController::class, 'logout'])->name('logout');

Route::get('getOffice/{id}', function ($id) {
    $office = App\Models\Office::where('region_id', $id)->get();
    return response()->json($office);
});

Route::get('ajax-autocomplete-search', [HistoryController::class, 'selectSearch']);
Route::get('ajax-autocomplete-search-item', [HistoryController::class, 'selectSearch_item']);
