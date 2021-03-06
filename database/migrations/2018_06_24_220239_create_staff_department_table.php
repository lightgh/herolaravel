<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_department', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staff_id');
            $table->integer('dept_id');
            $table->tinyInteger('status');
            $table->timestamps();
            $table->unique(['staff_id', 'dept_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_department');
    }
}
