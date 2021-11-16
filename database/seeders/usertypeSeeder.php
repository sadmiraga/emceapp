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
            array('id' => 1, 'userType' => 'Uporabnik', 'description' => 'Samostojno registrirani uporabnik'),
            array('id' => 2, 'userType' => 'Kelner', 'description' => 'Kelner ki ima dostop do izpolnjevanja popisa'),
            array('id' => 3, 'userType' => 'Operativc', 'description' => 'Ima dostop do vplogleva v turnirje in dogodke'),
            array('id' => 4, 'userType' => 'Direktor', 'description' => 'Direktor'),

        );
        DB::table('user_types')->insert($userTypes);
    }
}
