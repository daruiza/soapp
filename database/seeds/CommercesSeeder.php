<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommercesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('commerces')->insert(
            array(
                'name' => 'Fabrica Romano',
                'nit' => '1039420535-1',
                'phone' => '3214578',
                'department' => 'Antioquia',
                'city' => 'Medellín',
                'adress' => 'Cr 1 - 1 # 1',
                'description' => 'default store',
                'logo' => 'default.png',
                'user_id' => '2'
            )
        );

        DB::table('commerces')->insert(
            array(
                'name' => 'TempoSolutions',
                'nit' => '1039420535-2',
                'phone' => '3652458',
                'department' => 'Antioquia',
                'city' => 'Tarso',
                'adress' => 'Cr 2 - 2 # 1',
                'description' => 'tempo store',
                'logo' => 'tempo.png',
                'user_id' => '5',
            )
        );

        DB::table('commerces')->insert(
            array(
                'name' => 'Mrs',
                'nit' => '1039420535-3',
                'phone' => '2569874',
                'department' => 'Antioquia',
                'city' => 'Amaga',
                'adress' => 'Cr 3 - 3 # 1',
                'description' => 'mrs store',
                'logo' => 'mrs.png',
                'user_id' => '2',
            )
        );
    }
}
