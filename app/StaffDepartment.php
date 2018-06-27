<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffDepartment extends Model
{
    protected $table="staff_department";
    protected $fillable=['staff_id', 'dept_id', 'status'];
}
