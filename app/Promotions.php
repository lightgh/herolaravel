<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotions extends Model
{
    protected $table="promotions";
    protected $fillable=['level_id', 'staff_id', 
    	'promotion_date', 'status', 'description'];
}
