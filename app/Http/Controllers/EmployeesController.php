<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use DataTables;

use function GuzzleHttp\Promise\all;



class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Employee::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'. route('employees.edit', [$row->id]) .'" class="edit btn btn-success btn-sm">Edit</a> 
                    
                    <form action="'.route('employees.destroy',[$row->id]).'" method="POST" class="d-inline">'.method_field('delete') .csrf_field().'
                    <button class="delete btn btn-danger btn-sm" onclick="return confirm(\'Are You Sure?\')">Delete</button>
                    </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.Employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.Employee.create');
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
            'gender' => 'required',
            'address' => 'required',
            'nik' => 'required|unique:employees',
        ]);
        // $validatedData[;'']
        Employee::create($validatedData);

        return redirect('/admin/employees')->with('success', 'Success Add New Employee');
        // $data = $request -> all();        
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee, $id)
    {
        $employee = Employee::where('id', $id)->firstOrFail();

        return view('pages.admin.Employee.edit', [
            'employee' => $employee,
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee, $id)
    {
        $data = $request->all();

        $employee = Employee::where('id', $id)->firstOrFail();

        $validatedData = $request->validate([
            // 'id' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'nik' => 'required',
        ]);

        $employee->update($data);

        return redirect()->route('employees.list')->with('success','Edit Success');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee,$id)
    {
        $employee =
        Employee::where('id', $id);
        $employee->delete();

        return redirect()->route('employees.list')->with('success','Delete Success');
    }
}
