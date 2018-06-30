<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staff', function (Blueprint $table) {

            $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes($table->getTable());
            $index_name = 'staff_email_unique';

            if (array_key_exists($index_name, $indexes)) {
                $table->dropUnique('staff_email_unique');
            }

            if (Schema::hasColumn('staff', 'email')) {
                $table->string('email')->after('gender')->nullable()->change();
            }else{
                $table->string('email')->after('gender')->nullable();

            }


            $table->integer('state_id');
            $table->integer('lga_id');
            $table->date('firstappointdate');
            $table->string('staffclass'); //NA or AS
            $table->string('maritalstatus'); //S or M

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('staff', function (Blueprint $table) {
            if (!Schema::hasColumn('staff', 'email')) {
                $table->string('email')->after('gender')->unique();
            }else{
                $table->string('email')->after('gender')->unique()->change();
            }

            $table->dropColumn('state_id');
            $table->dropColumn('lga_id');
            $table->dropColumn('firstappointdate');
            $table->dropColumn('staffclass');
            $table->dropColumn('maritalstatus');
        });
    }
}
