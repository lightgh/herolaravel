<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('status/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('status/addnewstatus', ['status' => Status::all()]);
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
            'status' => 'required',
            'description' => 'present'
        ]);

        Status::create([
            'status' => $request->input('status'), 
            'description' => $request->input('description')
        ]);

        return redirect('status/create')->with('status', 'Status Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {

        $thisStatus = Status::findOrFail($status);

        $action = isset($_GET['action']) ? ($_GET['action'] == 'del'? 'delete' : 'show') : 'show';

        return view('status/addnewstatus')->with('status', $thisStatus)
            ->with('displaystate', $action);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        $thisStatus = Status::findOrFail($status);

        return view('status/addnewstatus')->with('status', $thisStatus)
            ->with('displaystate', 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Status $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        $request->validate([
            'status' => 'required',
            'description' => 'present'
        ]);

        $thisStatus = Status::findOrFail($status);

        $thisStatus = $thisStatus->first();

        $thisStatus->status = $request->input('status');
        $thisStatus->description = $request->input('description');

        $thisStatus->save();

        return redirect('status/'.$thisStatus->id)->with('status', "Status Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Status $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        $status->delete();
        return redirect('status/create')->with('status', "Status Deleted Successfully");
    }
}
