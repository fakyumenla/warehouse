<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Item;
use App\Models\Office;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $employee = Employee::all()->count();
        // $employees = $employee->count();

        $item = Item::all()->count();
        // $items = $item->count();

        $office = Office::all()->count();
        // $offices = $office->count(); 
        return view('pages.admin.dashboard',[
            'total_employees' => $employee,
            'total_items' => $item,
            'total_offices' => $office
        ]);
    }
}
