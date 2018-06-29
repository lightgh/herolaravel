<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department/addnewdepartment')->with('department', Department::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'department' => 'required',
            'description' => 'present'
        ]);

        Department::create([
            'department' => $request->input('department'), 
            'description' => $request->input('description')
        ]);

        return redirect('department/create')->with('status', 'Department Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {


        $aDepartment = Department::findOrFail($department);
        $action = isset($_GET['action']) ? ($_GET['action'] == 'del'? 'delete' : 'show') : 'show';

        return view('department/addnewdepartment')->with('department', $aDepartment )
            ->with('displaystate', $action);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $aDepartment = Department::findOrFail($department);
        return view('department/addnewdepartment')->with('department', $aDepartment )
            ->with('displaystate', 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'department' => 'required',
            'description' => 'present'
        ]);

        $thisDepartment = Department::findOrFail($department)->first();

        $thisDepartment->department = $request->input('department');
        $thisDepartment->description = $request->input('description') == null? "":$request->input('description');
        $thisDepartment->save();

        return redirect('department/'.$thisDepartment->id)->with('status', 'Department Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect('department/create')->with('status', 'Department Deleted Successfully');
    }
}
