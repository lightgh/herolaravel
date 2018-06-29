<?php

namespace App\Http\Controllers;

use App\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$state = \App\State::find(2);
        $stateLga = \App\State::getLga($state);
        dd($stateLga);*/
        return redirect('zone/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('zone/addnewzone')->with('zone', Zone::all());
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
            'gpzone' => 'required',
            'description' => 'present'
        ]);

        Zone::create([
            'gpzone' => $request->input('gpzone'), 
            'description' => $request->input('description')
        ]);

        return redirect('zone/create')->with('status', 'Zone Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Zone $zone
     * @return \Illuminate\Http\Response
     */
    public function show(Zone $zone)
    {
        $aZone = Zone::findOrFail($zone);

        $action = isset($_GET['action']) ? ($_GET['action'] == 'del'? 'delete' : 'show') : 'show';

        return view('zone/addnewzone')->with('zone', $aZone )
            ->with('displaystate', $action);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Zone $zone
     * @return \Illuminate\Http\Response
     */
    public function edit(Zone $zone)
    {
        $aZone = Zone::findOrFail($zone);
        return view('zone/addnewzone')->with('zone', $aZone )
            ->with('displaystate', 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Zone $zone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zone $zone)
    {
        $request->validate([
            'gpzone' => 'required',
            'description' => 'present'
        ]);



        $thisZone = Zone::findOrFail($zone)->first();

        $thisZone->description = $request->input('description') == null? "":$request->input('description');
        $thisZone->gpzone = $request->input('gpzone');
        $thisZone->save();

        return redirect('zone/'.$thisZone->id)->with('status', 'Zone Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Zone $zone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zone $zone)
    {
        $zone->delete();
        return redirect('zone/create')->with('status', 'Zone Deleted Successfully');
    }
}
