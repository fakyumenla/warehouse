<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\History_ownership;
use App\Models\Item;
use Illuminate\Http\Request;
use DataTables;
use Doctrine\DBAL\SQL\Parser\Visitor;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = History_ownership::with('item','employee')->select('history_ownerships.*')->latest();
            # Here 'history_ownerships' is the name of table for Documents Model
            # And 'item' is the name of relation on Document Model.
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('item_str', function($row){
                    # 'name' is the field in table of Status Model
                    return $row->item->name;
               })
                ->addColumn('employee_str', function($row){
                    # 'name' is the field in table of Status Model
                    return $row->employee->name;
               })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> 
                    <form action="'.route('histories.destroy',[$row->id]).'" method="POST" class="d-inline">'.method_field('delete') .csrf_field().'
                    <button class="delete btn btn-danger btn-sm" onclick="return confirm(\'Are You Sure?\')">Delete</button>
                    </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.Transaction.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.Transaction.create');
    }

    public function selectSearch(Request $request)
    {
        $names = [];

        if ($request->has('q')) {
            $search = $request->q;
            $names = Employee::select("id", "name")
            ->where('name', 'LIKE', "%$search%")
            ->get();
        }
        return response()->json($names);
    }
    public function selectSearch_item(Request $request)
    {
        $items = [];

        if ($request->has('q')) {
            $search = $request->q;
            $items = Item::select("id", "name")
            ->where('name', 'LIKE', "%$search%")
            ->get();
        }
        return response()->json($items);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 'id' => 'required',
          
            'employee_id' => 'required',
            'item_id' => 'required',
            'start_date' => 'required'
            
        ]);

        History_ownership::create($validatedData);
        return redirect('/admin/histories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\History_ownership  $history_ownership
     * @return \Illuminate\Http\Response
     */
    public function show(History_ownership $history_ownership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\History_ownership  $history_ownership
     * @return \Illuminate\Http\Response
     */
    public function edit(History_ownership $history_ownership)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\History_ownership  $history_ownership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, History_ownership $history_ownership)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\History_ownership  $history_ownership
     * @return \Illuminate\Http\Response
     */
    public function destroy(History_ownership $history_ownership,$id)
    {
        $history_ownership = History_ownership::findOrFail($id);
        $history_ownership->delete();

        return redirect()->route('histories.list')->with('success','Delete Success');
    }


}
