<?php

use Illuminate\Database\Seeder;

class CreateBasicSettingsSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('users')->count() <= 0){
        	DB::table('users')->insert([
        		'name' => "Abubakar Sadiq Ango",
        		'email' => "light@uplift.ng",
        		'password' => bcrypt('secret'),
        		'access_level' => 1
         	]);
        }
    }
}
