<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Office;
use App\Models\Region;
use App\Models\Type;
use App\Models\Employee;
use App\Models\History_ownership;
// use Illuminate\Http\Request;
use DataTables;

use Illuminate\Http\Request;

class ItemsUserController extends Controller
{
    public function show($body, $id)
    {
        $items = Item::where('id', $id)->firstOrFail();
        $office = Office::where('id', $items->office_id)->firstOrFail();
        $region = Region::where('id', $office->region_id)->firstOrFail();
        $history = History_ownership::where('item_id', $items->id)->get();
        if (request()->ajax()) {
            $data = History_ownership::with('employee', 'item')->select('history_ownerships.*')->where('item_id', $items->id)->latest()->get();
            # Here 'items' is the name of table for Documents Model
            # And 'region' is the name of relation on Document Model.
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
                // ->addColumn('action', function ($row) {
                //     $actionBtn = '<a href="' . route('histories.edit', [$row->id]) . '" class =" edit btn btn-success btn-sm">Edit</a> 
                //     <form action="' . route('histories.destroy', [$row->id]) . '" method="POST" class="d-inline">' . method_field('delete') . csrf_field() . '
                //     <button class="delete btn btn-danger btn-sm" onclick="return confirm(\'Are You Sure?\')">Delete</button>
                //     </form>';
                //     return $actionBtn;
                // })
                // ->rawColumns(['action'])
                ->make(true);
        }



        return view('pages.detail_item', [
            'item' => $items,
            'office' => $office,
            'region'  => $region,
            'history' => $history
        ]);

        // return $history;
    }
}
