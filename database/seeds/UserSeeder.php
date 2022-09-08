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
            'lastname' => 'super',
            'phone' => '0000',
            'email' => 'super@yopmail.com',
            'password' => Hash::make('0000'),
            'rol_id' => '1',
        ));

        DB::table('users')->insert(array(
            'name' => 'admin',
            'lastname' => 'super',
            'phone' => '0000',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('0000'),
            'rol_id' => '2',
        ));

        DB::table('users')->insert(array(
            'name' => 'Responsable',
            'lastname' => 'super',
            'phone' => '0000',
            'email' => 'responsable@gmail.com',
            'password' => Hash::make('0000'),
            'rol_id' => '3',
        ));
    }
}
