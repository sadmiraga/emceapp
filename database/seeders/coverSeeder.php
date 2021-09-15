<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class coverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('cover_images')->delete();
        $coverImages = array(
            array('id' => 1, 'image' => 'cover.jpg', 'date' => '20.20.2000')

        );
        DB::table('cover_images')->insert($coverImages);
    }
}
