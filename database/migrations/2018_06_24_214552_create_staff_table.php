<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('oname');
            $table->string('email')->unique();
            $table->enum('gender', ['M', 'F'] );
            $table->string('photo')->nullable();
            $table->string('staffno')->unique();
            $table->date('dateobirth');
            $table->text('address1');
            $table->text('address2')->nullable();
            $table->integer('status')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
