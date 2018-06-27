<?php

namespace App\Http\Controllers;

use App\Staff;
use App\Department;
use App\Level;
use App\Promotions;
use App\StaffDepartment;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::all();

        return view('staff/viewstaff', [ 'staff' => $staff ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deparment = Department::all();
        $level = Level::all();

        return view('addnewstaff', ['department'=>$deparment, 'level' => $level]);
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
            'firstname' => 'required',
            'lastname' => 'required',
            'othername' => 'required',
            'gender' => 'required',
            'staffno' => 'required|unique:staff',
            'email' => 'required|unique:staff',
            'address1' => 'required',
            'address2' => 'required',
            'dateobirth' => 'required|date',
            'department' => 'required|integer',
            'level' => 'required|integer',
            'photo' => 'file',
        ]);

       if($request->hasFile('photo')){
         if($request->file('photo')->isValid()){
            $photoPath = $request->photo->store('photo');
         }
       }

       $photoPath = empty($pathPath)? " " : $photoPath;

       $newStaff = Staff::create([
        'fname' => $request->input('firstname'), 
        'lname' => $request->input('lastname'), 
        'oname' => $request->input('othername'), 
        'email' => $request->input('email'), 
        'gender' => $request->input('gender'), 
        'staffno' => $request->input('staffno'), 
        'address1' => $request->input('address1'), 
        'address2' => $request->input('address2'), 
        'dateobirth' => $request->input('dateobirth'), 
        'status' => 1, 
        'photo' => $photoPath, 
       ]);

       $promotions = Promotions::create([
            'level_id' => $request->input('level'),
            'staff_id' => $newStaff->id,
            'promotion_date' => \Carbon\Carbon::now(),
            'description' => "Base Level Entry / Base Promotions",
            'status' => 1
       ]);

       $staffDept = StaffDepartment::create([
            'staff_id' => $newStaff->id,
            'dept_id' => $request->input('department'),
            'status' => 1 // 1 
       ]);

       return redirect('staff')->with('status', 'Successfully Added New Staff. View Staff Records');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        //
    }
}
