<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class usertypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->delete();
        $userTypes = array(
            array('id' => 1, 'userType' => 'Uporabnik', 'description' => 'blank'),
            array('id' => 2, 'userType' => 'Kelner', 'description' => 'blank'),
            array('id' => 3, 'userType' => 'Šef Šanka', 'description' => 'blank'),
            array('id' => 4, 'userType' => 'Uprava', 'description' => 'blank'),
            array('id' => 5, 'userType' => 'Direktor', 'description' => 'blank'),

        );
        DB::table('user_types')->insert($userTypes);
    }
}
