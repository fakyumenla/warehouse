<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use DataTables;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Region::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="'. route('regions.edit', [$row->id]) .'" class="edit btn btn-success btn-sm">Edit</a> 
                    <form action="'.route('regions.destroy',[$row->id]).'" method="POST" class="d-inline">'.method_field('delete') .csrf_field().'
                    <button class="delete btn btn-danger btn-sm" onclick="return confirm(\'Are You Sure?\')">Delete</button>
                    </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.Region.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.Region.create');
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
        ]);
        // $validatedData[;'']
        Region::create($validatedData);

        return redirect('/admin/regions')->with('success', 'success add new region');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region,$id)
    {
        $region = Region::where('id',$id)->firstOrFail();

        return view('pages.admin.Region.edit', [
            'region' => $region,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $region,$id)
    {
        $data = $request->all();

        $region = Region::where('id',$id)->firstOrFail();

        $region->update($data);

        return redirect()->route('regions.list')->with('success','Edit Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region,$id)
    {
        $region = Region::where('id',$id);
        $region->delete();

        return redirect()->route('regions.list')->with('success','Delete Success');
    }
}
