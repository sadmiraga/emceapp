<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class drinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drinks')->delete();
        $drinks = array(
            array('id' => 1, 'name' => 'Jameson', 'price' => '2.2', 'weightable' => true, 'packing_weight' => 1, 'category_id' => 2),
            array('id' => 2, 'name' => 'Coca Cola', 'price' => '1', 'weightable' => true, 'packing_weight' => 0.5, 'category_id' => 2),
            array('id' => 3, 'name' => 'Fanta', 'price' => '1.8', 'weightable' => false, 'packing_weight' => null, 'category_id' => 1),

        );
        DB::table('drinks')->insert($drinks);
    }
}
