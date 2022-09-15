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
            'name' => 'super-admin',
            'lastname' => 'super',
            'phone' => '0000',
            'email' => 'superadmin@yopmail.com',
            'password' => Hash::make('0000'),
            'theme' => 'blue',
            'photo' => 'avatar',
            'rol_id' => '1',
        ));

        DB::table('users')->insert(array(
            'name' => 'cliente',
            'lastname' => 'super',
            'phone' => '0000',
            'email' => 'cliente@gmail.com',
            'password' => Hash::make('0000'),
            'theme' => 'dark',
            'photo' => 'avatar',
            'rol_id' => '2',
        ));

        DB::table('users')->insert(array(
            'name' => 'Responsable',
            'lastname' => 'super',
            'phone' => '0000',
            'email' => 'responsable@gmail.com',
            'password' => Hash::make('0000'),
            'theme' => 'grey',
            'photo' => 'avatar',
            'rol_id' => '3',
        ));
    }
}
