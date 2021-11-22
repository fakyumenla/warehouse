<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Office;
use App\Models\Region;
use App\Models\Type;
use Illuminate\Http\Request;
use DataTables;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Item::with('region','office','type')->select('items.*')->latest()->get();
            # Here 'items' is the name of table for Documents Model
            # And 'region' is the name of relation on Document Model.
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('type_str', function($row){
                    # 'name' is the field in table of Status Model
                    return $row->type->name;
               })
                ->addColumn('office_str', function($row){
                    # 'name' is the field in table of Status Model
                    return $row->office->name;
               })
                ->addColumn('region_str', function($row){
                      # 'name' is the field in table of Status Model
                      return $row->region->name;
                 })
                 ->addColumn('detail', function($row){
                    $detailBtn = '<a href="'.route('items.details',[$row->name,$row->id]).'" class="btn btn-primary d-flex justify-content-center">Detail</a>';
                    return $detailBtn;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action','detail'])
                ->make(true);
        }
        return view('pages.admin.Item.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.Item.create', [
            'regions' => Region::all(),
            'types' => Type::all(),
            'offices' => Office::all()
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
            'office_id' => 'required',
            'type_id' => 'required',
            'region_id' => 'required',
            'description' => 'required',
            'barcode_image' => 'required'
        ]);

        Item::create($validatedData);
        return redirect('/admin/items');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item $items
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item,$name,$id)
    { 
        $items = Item::findOrFail($id);
        $office = Office::findOrFail($items->office_id);
        $region = Region::findOrFail($office->region_id);
        return view('pages.admin.Item.detail',[
            'item' => $items,
            'office' => $office,
            'region'  => $region
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $items
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
