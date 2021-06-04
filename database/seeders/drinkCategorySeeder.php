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
            array('id' => 1, 'categoryName' => 'Brezalkoholne pijače'),
            array('id' => 2, 'categoryName' => 'Alkoholne pijače'),
            array('id' => 3, 'categoryName' => 'Žgane pijače'),
            array('id' => 4, 'categoryName' => 'Tople pijače'),

        );
        DB::table('drink_categories')->insert($users);
    }
}
