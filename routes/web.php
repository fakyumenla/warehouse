<?php

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

Route::get('/', function () {
    return view('pages.admin.dashboard');
});

Route::get('/items', function () {
    return view('pages.admin.Item.tableItems');
});

Route::get('/employees', function () {
    return view('pages.admin.Employee.tableEmployee');
});

Route::get('/transactions', function () {
    return view('pages.admin.Transaction.tableTransaction');
});

Route::get('/offices', function () {
    return view('pages.admin.Office.tableOffice');
});

