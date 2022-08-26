<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            'name' => 'super',
            'email' => 'super@yopmail.com',
            'password' => Hash::make('0000'),
        ));

        DB::table('users')->insert(array(
            'name' => 'admin',
            'email' => 'admin@yopmail.com',
            'password' => Hash::make('0000'),
        ));
    }
}
