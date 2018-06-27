<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $table = "leave";
    protected $fillable = ['from', 'to', 'staff_id', 'status', 'description'];
}
