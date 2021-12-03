<?php

namespace App\Http\Controllers;

use App\Models\History_ownership;
use App\Models\Item;
use App\Models\Type;
use Illuminate\Http\Request;
use DataTables;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Type::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="'. route('types.edit', [$row->id]) .'" class="edit btn btn-success btn-sm">Edit</a> 
                    <form action="'.route('types.destroy',[$row->id]).'" method="POST" class="d-inline">'.method_field('delete') .csrf_field().'
                    <button class="delete btn btn-danger btn-sm" onclick="return confirm(\'Are You Sure?\')">Delete</button>
                    </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.Type.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.Type.create');
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
        type::create($validatedData);

        return redirect('/admin/types')->with('success', 'success add new type');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type,$id)
    {
        $type = Type::where('id',$id)->firstOrFail();

        return view('pages.admin.Type.edit', [
            'type' => $type,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type, $id)
    {
        $data = $request->all();

        $type = Type::where('id',$id)->firstOrFail();

        $validatedData = $request->validate([
            // 'id' => 'required',
            'name' => 'required',
        ]);

        $type->update($data,$validatedData);

        return redirect()->route('types.list')->with('success','Edit Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type,$id)
    {
        $type = Type::where('id',$id);
        $item = Item::where('type_id',$id);
        $items = Item::where('type_id', $id)->get();
        foreach($items as $item){
            $history = History_ownership::where('item_id',$item->id);
            $history->delete();
        }

        $item->delete();
        $type->delete();

        return redirect()->route('types.list')->with('success','Delete Success');
    }
}
