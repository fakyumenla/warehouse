<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use App\Models\Employee;
// use App\Models\History_ownership;
use App\Models\Item;
// use Illuminate\Http\Request;
use DataTables;
use Doctrine\DBAL\SQL\Parser\Visitor;
use Illuminate\Support\Facades\Session as FacadesSession;
// use Illuminate\Support\Facades\Session;
use Session;
use Redirect;

class HistorysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, History $history)
    {
        // dd($history);
        if (request()->ajax()) {
            $data = History::with('item', 'employee')->select('histories.*')->latest();
            // $data = History::with('item', 'employee')->select('histories.*')->latest()->get();
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
        $fullUrl = $request->fullUrl();
        // var_dump($fullUrl);
        // dd($fullUrl);
        // if ($fullUrl != null) {
        //     $request->session()->put('backUrl', $fullUrl);
        // }
        $request->session()->put('backUrl', $fullUrl);
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
            'start_date' => 'required',
            // 'end_date' => '-'

        ]);

        History::create($validatedData);
        return redirect()->route('histories.list')->with('success', 'Add Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function show(History $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,History $history)
    {
        // $history =  History_ownership::where('id', $history_ownership->id)->firstOrFail();
        // $item = Item::where('id', $history->item_id)->get();
        // dd($history->employee_id);
        $item = Item::where('id', $history->item_id)->firstOrFail();
        $employee = Employee::where('id', $history->employee_id)->firstOrFail();

        // if (Session::has('backUrl')) {
        //     Session::keep('backUrl');
        // }

        if ($request->session()->has('backUrl')) {
            $request->session()->keep('backUrl');
        }
        // var_dump($history_ownership->item_id);
        // dd($request->session()->('backUrl'));


        // if(FacadesSession::has('backUrl')){
        //     FacadesSession::keep('backUrl');
        // }
        return view('pages.admin.Transaction.edit', [
            'history' => $history,
            'item' => $item,
            'employee' => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, History $history)
    {
        $data = $request->all();
        // $history = History_ownership::where('id', $histoid)->firstOrFail();
        $history->update($data);
        // if ($request->session()->has('backUrl')) {
        //     $request->session()->keep('backUrl');
        // }
        return ($url = $request->session()->get('backUrl'))
            ?  Redirect::to($url)->with('success', 'Edit Success')
            : Redirect::route('histories.list')->with('success', 'Edit Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function destroy(History $history, Request $request)
    {
        // $history_ownership = History_ownership::where('id', $id);
        $history->delete();

        return ($url = $request->session()->get('backUrl'))
            ?  Redirect::to($url)->with('success', 'Edit Success')
            : Redirect::route('histories.list')->with('success', 'Delete Success');
    }
}