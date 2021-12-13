<?php

namespace App\Http\Controllers;

use App\Models\History_ownership;
use App\Models\Office;
use App\Models\Region;
use App\Models\Item;
use Illuminate\Http\Request;
use DataTables;

class OfficesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Office::with('region')->select('offices.*')->latest()->get();
            # Here 'offices' is the name of table for Documents Model
            # And 'regions' is the name of relation on Document Model.
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('region_str', function($row){
                      # 'name' is the field in table of Status Model
                      return $row->region->name;
                 })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'. route('offices.edit', [$row->id]) .'" class="edit btn btn-success btn-sm">Edit</a> 
                    <form action="'.route('offices.destroy',[$row->id]).'" method="POST" class="d-inline">'.method_field('delete') .csrf_field().'
                    <button class="delete btn btn-danger btn-sm" onclick="return confirm(\'Are You Sure?\')">Delete</button>
                    </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.Office.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.Office.create',[
            'regions' => Region::all()
        ]);
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
            'name' => 'required',
            'region_id' => 'required',
            'address' => 'required'
        ]);
        // $validatedData[;'']
        Office::create($validatedData);

        return redirect()->route('offices.list')->with('success', 'success add new office');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offices  $offices
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offices  $offices
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office)
    {
        // $office = Office::where('id',$id)->firstOrFail();

        return view('pages.admin.Office.edit', [
            'office' => $office,
            'regions' => Region::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offices  $offices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $office)
    {
        $data = $request->all();


        $validatedData = $request->validate([
            // 'id' => 'required',
            'name' => 'required',
            'region_id' => 'required',
            'address' => 'required'
        ]);
        // $office = Office::where('id',$id)->firstOrFail();

        $office->update($data,$validatedData);

        return redirect()->route('offices.list')->with('success','Edit Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offices  $offices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        // $office = Office::where('id',$id);
        // $item = Item::where('office_id',$id);
        // $items = Item::where('office_id', $id)->get();
        // foreach($items as $item){
        //     $history = History_ownership::where('item_id',$item->id);
        //     $history->delete();
        // }

        // $item->delete();
        $office->delete();

        return redirect()->route('offices.list')->with('success','Delete Success');
    }
}
