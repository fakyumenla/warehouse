<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Item;
use App\Models\History_ownership;
use App\Models\Office;
use DataTables;
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

        if (request()->ajax()) {
            $data = History_ownership::with('item', 'employee')->select('history_ownerships.*')->latest();
            # Here 'history_ownerships' is the name of table for Documents Model
            # And 'item' is the name of relation on Document Model.
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('item_str', function ($row) {
                    # 'name' is the field in table of Status Model
                    return $row->item->name;
                })
                ->addColumn('employee_str', function ($row) {
                    # 'name' is the field in table of Status Model
                    return $row->employee->name;
                })
                ->addcolumn('end_date', function ($row) {
                    if ($row->end_date == null) {
                        $end_date = '-';
                    } else {
                        $end_date = $row->end_date;
                    }
                    return $end_date;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('histories.edit', [$row->id]) . '" class="edit btn btn-success btn-sm">Edit</a> 
                    <form action="' . route('histories.destroy', [$row->id]) . '" method="POST" class="d-inline">' . method_field('delete') . csrf_field() . '
                    <button class="delete btn btn-danger btn-sm" onclick="return confirm(\'Are You Sure?\')">Delete</button>
                    </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.dashboard',[
            'total_employees' => $employee,
            'total_items' => $item,
            'total_offices' => $office
        ]);
    }
}
