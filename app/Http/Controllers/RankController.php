<?php

namespace App\Http\Controllers;

use App\Rank;
use Illuminate\Http\Request;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('rank/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rank/addnewrank')->with('rank', Rank::all());
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
            'rank' => 'required|unique:ranks',
            'staffclass' => 'required',
            'description' => 'present'
        ]);

        Rank::create([
            'rank' => $request->input('rank'), 
            'staffclass' => $request->input('staffclass'), 
            'description' => $request->input('description') == null? "":$request->input('description')
        ]);

        return redirect('rank/create')->with('status', 'Rank Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Rank $rank
     * @return \Illuminate\Http\Response
     */
    public function show(Rank $rank)
    {
        $aRank = Rank::findOrFail($rank);

        $action = isset($_GET['action']) ? ($_GET['action'] == 'del'? 'delete' : 'show') : 'show';

        return view('rank/addnewrank')->with('rank', $aRank )
            ->with('displaystate', $action);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Rank $rank
     * @return \Illuminate\Http\Response
     */
    public function edit(Rank $rank)
    {
        $aRank = Rank::findOrFail($rank);
        return view('rank/addnewrank')->with('rank', $aRank )
            ->with('displaystate', 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Rank $rank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rank $rank)
    {
        $thisRank = Rank::findOrFail($rank)->first();

        if(trim($thisRank->rank) == trim($request->input('rank'))){
            $validationRule = [
                'rank' => 'required',
                'description' => 'present',
                'staffclass' => 'required'
            ];

            // $thisRank->rank = $request->input('rank');
        }else{
            $validationRule = [
                'rank' => 'required|unique:ranks',
                'staffclass' => 'required',
                'description' => 'present'
            ];
        }
        
        $request->validate($validationRule);

        $thisRank->rank = $request->input('rank');
        $thisRank->staffclass = $request->input('staffclass');
        $thisRank->description = $request->input('description') == null? "":$request->input('description');
        $thisRank->save();

        return redirect('rank/'.$thisRank->id)->with('status', 'Rank Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Rank $rank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rank $rank)
    {
        $rank->delete();
        return redirect('rank/create')->with('status', 'Rank Deleted Successfully');
    }
}
