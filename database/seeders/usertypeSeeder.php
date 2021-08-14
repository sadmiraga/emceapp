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
            array('id' => 1, 'userType' => 'Uporabnik', 'description' => 'UPORABNIK opis pravic in delovnih nalog'),
            array('id' => 2, 'userType' => 'Kelner', 'description' => 'KELNER opis pravic in delovnih nalog'),
            array('id' => 3, 'userType' => 'Šef Šanka', 'description' => 'SEF SANKA opis pravic in delovnih nalog'),
            array('id' => 4, 'userType' => 'Uprava', 'description' => 'UPRAVA opis pravic in delovnih nalog'),
            array('id' => 5, 'userType' => 'Direktor', 'description' => 'DIREKTOR opis pravic in delovnih nalog'),

        );
        DB::table('user_types')->insert($userTypes);
    }
}
