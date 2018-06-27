<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
	
    protected $fillable = ['fname', 'lname', 'oname', 'email', 'gender'
    	,'photo', 'staffno', 'dateobirth', 'address1', 'address2', 'status'];
}
