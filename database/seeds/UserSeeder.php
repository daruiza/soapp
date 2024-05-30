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
            'phone' => '3194065226',
            'email' => 'superadmin@yopmail.com',
            'password' => Hash::make('0000'),
            'theme' => 'super',
            'photo' => null,
            'rol_id' => '1',
        ));

        DB::table('users')->insert(array(
            'name' => 'cliente',
            'lastname' => 'super',
            'phone' => '3164056225',
            'email' => 'cliente@gmail.com',
            'password' => Hash::make('0000'),
            'theme' => 'skyblue',
            'photo' => null,
            'rol_id' => '2',
        ));

        DB::table('users')->insert(array(
            'name' => 'Agente',
            'lastname' => 'super',
            'phone' => '3124567891',
            'email' => 'agente@gmail.com',
            'password' => Hash::make('0000'),
            'theme' => 'skyblue',
            'photo' => null,
            'rol_id' => '3',
        ));

        DB::table('users')->insert(array(
            'name' => 'Agente01',
            'lastname' => 'AGT002',
            'phone' => '3124567891',
            'email' => 'agente02@gmail.com',
            'password' => Hash::make('0000'),
            'theme' => 'skyblue',
            'photo' => null,
            'rol_id' => '3',
        ));

        DB::table('users')->insert(array(
            'name' => 'cliente2',
            'lastname' => 'super2',
            'phone' => '3107894561',
            'email' => 'cliente2@gmail.com',
            'password' => Hash::make('0000'),
            'theme' => 'skyblue',
            'photo' => null,
            'rol_id' => '2',
        ));
    }
}
