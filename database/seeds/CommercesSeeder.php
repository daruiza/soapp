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
                'department' => 'Antioquia',
                'city' => 'Medellín',
                'adress' => 'Cr 1 - 1 # 1',
                'description' => 'default store',
                'logo' => 'default.png',
                'user_id' => '1'
            )
        );

        DB::table('commerces')->insert(
            array(
                'name' => 'TempoSolutions',
                'nit' => '1039420535-2',
                'department' => 'Antioquia',
                'city' => 'Tarso',
                'adress' => 'Cr 2 - 2 # 1',
                'description' => 'tempo store',
                'logo' => 'tempo.png',
                'user_id' => '2',
            )
        );

        DB::table('commerces')->insert(
            array(
                'name' => 'Mrs',
                'nit' => '1039420535-3',
                'department' => 'Antioquia',
                'city' => 'Amaga',
                'adress' => 'Cr 3 - 3 # 1',
                'description' => 'mrs store',
                'logo' => 'mrs.png',
                'user_id' => '2',
            )
        );

        DB::table('commerces')->insert(
            array(
                'name' => 'Glitch',
                'nit' => '1039420535-4',
                'department' => 'Antioquia',
                'city' => 'Amaga',
                'adress' => 'Cr 3 - 5 # 1',
                'description' => 'glitch store',
                'logo' => 'glitch34.png',
            )
        );

        DB::table('commerces')->insert(
            array(
                'name' => 'five',
                'nit' => '1039420535-90',
                'department' => 'Antioquia',
                'city' => 'Bolombolo',
                'adress' => 'Cr 3 - 9 # 1',
                'description' => 'five store',
                'logo' => 'glitch300.png',
            )
        );

        DB::table('commerces')->insert(
            array(
                'name' => 'six',
                'nit' => '1039420535-85',
                'department' => 'Antioquia',
                'city' => 'Bolombolo',
                'adress' => 'Cr 3 - 40 # 1',
                'description' => 'six store',
                'logo' => 'six.png',
            )
        );

        DB::table('commerces')->insert(
            array(
                'name' => 'Combox',
                'nit' => '1039420535-19',
                'department' => 'Antioquia',
                'city' => 'Bolombolo',
                'adress' => 'Cr 3 - 47 # 1',
                'description' => 'combox store',
                'logo' => 'conbox.png',
            )
        );

        DB::table('commerces')->insert(
            array(
                'name' => 'Macalu',
                'nit' => '1039420535-111',
                'department' => 'Antioquia',
                'city' => 'Pueblorrico',
                'adress' => 'Cr 3 - 11 # 1',
                'description' => 'macalu store',
                'logo' => 'macalu.png',
            )
        );

        DB::table('commerces')->insert(
            array(
                'name' => 'Cocolu',
                'nit' => '1039420535-8',
                'department' => 'Antioquia',
                'city' => 'Pueblorrico',
                'adress' => 'Cr 3 - 88 # 1',
                'description' => 'cocolu store',
                'logo' => 'cocolu.png',
            )
        );

        DB::table('commerces')->insert(
            array(
                'name' => 'Fabrica RomanoTowVer',
                'nit' => '1039420535-1855',
                'department' => 'Antioquia',
                'city' => 'Medellín',
                'adress' => 'Cr 1 - 1 # 1',
                'description' => 'coPidefault store',
                'logo' => 'default.png',
            )
        );

        DB::table('commerces')->insert(
            array(
                'name' => 'TempoSolutionsTowVer',
                'nit' => '1039420535-2855',
                'department' => 'Antioquia',
                'city' => 'Tarso',
                'adress' => 'Cr 2 - 2 # 1',
                'description' => 'coPitempo store',
                'logo' => 'tempo.png',
            )
        );

        DB::table('commerces')->insert(
            array(
                'name' => 'MrsTowVer',
                'nit' => '1039420535-3855',
                'department' => 'Antioquia',
                'city' => 'Amaga',
                'adress' => 'Cr 3 - 3 # 1',
                'description' => 'coPimrs store',
                'logo' => 'mrs.png',
            )
        );

        DB::table('commerces')->insert(
            array(
                'name' => 'GlitchTowVer',
                'nit' => '1039420535-4855',
                'department' => 'Antioquia',
                'city' => 'Amaga',
                'adress' => 'Cr 3 - 5 # 1',
                'description' => 'coPiglitch store',
                'logo' => 'glitch.png',
            )
        );

        DB::table('commerces')->insert(
            array(
                'name' => 'fiveTowVer',
                'nit' => '1039420535-5855',
                'department' => 'Antioquia',
                'city' => 'Bolombolo',
                'adress' => 'Cr 3 - 9 # 1',
                'description' => 'coPifive store',
                'logo' => 'glitch.png',
            )
        );

        DB::table('commerces')->insert(
            array(
                'name' => 'sixTowVer',
                'nit' => '1039420535-5855',
                'department' => 'Antioquia',
                'city' => 'Bolombolo',
                'adress' => 'Cr 3 - 40 # 1',
                'description' => 'coPisix store',
                'logo' => 'six.png',
            )
        );

        DB::table('commerces')->insert(
            array(
                'name' => 'ComboxTowVer',
                'nit' => '1039420535-10855',
                'department' => 'Antioquia',
                'city' => 'Bolombolo',
                'adress' => 'Cr 3 - 47 # 1',
                'description' => 'coPicombox store',
                'logo' => 'conbox.png',
            )
        );

        DB::table('commerces')->insert(
            array(
                'name' => 'MacaluTowVer',
                'nit' => '1039420535-10855',
                'department' => 'Antioquia',
                'city' => 'Pueblorrico',
                'adress' => 'Cr 3 - 11 # 1',
                'description' => 'coPimacalu store',
                'logo' => 'macalu.png',
            )
        );

        DB::table('commerces')->insert(
            array(
                'name' => 'CocoluTowVer',
                'nit' => '1039420535-8855',
                'department' => 'Antioquia',
                'city' => 'Pueblorrico',
                'adress' => 'Cr 3 - 88 # 1',
                'description' => 'coPicocolu store',
                'logo' => 'cocolu.png',
            )
        );
    }
}
