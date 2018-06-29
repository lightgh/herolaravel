<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = "state";

    public static function getLga(State $state)
    {
    	return Lga::where('stateid', $state->id)->get()->all();
    }

    public function lga(){
    	return $this->hasMany('lga');
    }
}
