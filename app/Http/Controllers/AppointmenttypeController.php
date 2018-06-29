<?php

namespace App\Http\Controllers;

use App\AppointmentType;
use Illuminate\Http\Request;

class AppointmenttypeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('appointmenttype/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appointmenttype/addnewappointmenttype')->with('appointmenttype', AppointmentType::all());
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
            'appointmenttype' => 'required|min:2',
            'description' => 'present'
        ]);

        AppointmentType::create([
            'appointmenttype' => $request->input('appointmenttype'), 
            'description' => $request->input('description')
        ]);

        return redirect('appointmenttype/create')->with('status', 'AppointmentType Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\AppointmentType $appointmenttype
     * @return \Illuminate\Http\Response
     */
    public function show(int $appointmenttype)
    {
        $anAppointmentType = AppointmentType::findOrFail($appointmenttype);

        $action = isset($_GET['action']) ? ($_GET['action'] == 'del'? 'delete' : 'show') : 'show';

        return view('appointmenttype/addnewappointmenttype')
            ->with('appointmenttype', AppointmentType::all())
            ->with('singleappointmenttype',  $anAppointmentType)
            ->with('displaystate', $action);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\AppointmentType $thisAppointmentType
     * @return \Illuminate\Http\Response
     */
    public function edit(int $thisAppointmentType)
    {
        // dd($thisAppointmentType);
        $anAppointmentType = AppointmentType::findOrFail($thisAppointmentType);
        // dd($anAppointmentType);
        return view('appointmenttype/addnewappointmenttype')
            ->with('appointmenttype', AppointmentType::all())
            ->with('singleappointmenttype',  $anAppointmentType)
            ->with('displaystate', 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\AppointmentType $appointmentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $appointmentType)
    {
        $request->validate([
            'appointmenttype' => 'required|min:2',
            'description' => 'present'
        ]);



        $thisAppointmentType = AppointmentType::findOrFail($appointmentType);

        $thisAppointmentType->description = $request->input('description') == null? "":$request->input('description');
        $thisAppointmentType->appointmenttype = $request->input('appointmenttype');
        $thisAppointmentType->save();

        return redirect('appointmenttype/'.$thisAppointmentType->id)->with('status', 'AppointmentType Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\AppointmentType $appointmentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $appointmentType)
    {
        AppointmentType::findOrFail($appointmentType)->delete();
        return redirect('appointmenttype/create')->with('status', 'AppointmentType Deleted Successfully');
    }
}
