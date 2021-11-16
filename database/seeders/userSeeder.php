<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $users = array(
            array('id' => 1, 'firstName' => 'Sadmir', 'lastName' => 'Hasanic', 'email' => 'uporabnik@gmail.com', 'password' => '$2y$10$.h5OFviwCBjyrNZMlw1d8.m1qPQ5sRXcOyvbEPMlsQddn//tB.n9.', 'type_id' => '1'),
            array('id' => 2, 'firstName' => 'Sadmir', 'lastName' => 'Hasanic', 'email' => 'kelner@gmail.com', 'password' => '$2y$10$.h5OFviwCBjyrNZMlw1d8.m1qPQ5sRXcOyvbEPMlsQddn//tB.n9.', 'type_id' => '2'),
            array('id' => 3, 'firstName' => 'Sadmir', 'lastName' => 'Hasanic', 'email' => 'uperativc@gmail.com', 'password' => '$2y$10$.h5OFviwCBjyrNZMlw1d8.m1qPQ5sRXcOyvbEPMlsQddn//tB.n9.', 'type_id' => '3'),
            array('id' => 4, 'firstName' => 'Sadmir', 'lastName' => 'Hasanic', 'email' => 'direktor@gmail.com', 'password' => '$2y$10$.h5OFviwCBjyrNZMlw1d8.m1qPQ5sRXcOyvbEPMlsQddn//tB.n9.', 'type_id' => '4'),



        );
        DB::table('users')->insert($users);
    }
}
