<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateStaffExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staff_extras', function (Blueprint $table) {
            $table->dropColumn('value');
            $table->string('description');
            $table->string('registeredprobody');
            $table->string('qualificationcategory');
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('staff_extras', function (Blueprint $table) {
            $table->string("value");
            $table->dropColumn('description');
            $table->dropColumn('qualificationcategory');
            $table->dropColumn('registeredprobody');
            $table->dropColumn('status');
        });
    }
}
