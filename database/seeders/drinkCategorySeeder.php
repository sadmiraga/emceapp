<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class drinkCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drink_categories')->delete();
        $users = array(
            array('id' => 1, 'name' => 'Brezalkoholne pijače'),
            array('id' => 2, 'name' => 'Alkoholne pijače'),
            array('id' => 3, 'name' => 'Žgane pijače'),
            array('id' => 4, 'name' => 'Tople pijače'),

        );
        DB::table('drink_categories')->insert($users);
    }
}
