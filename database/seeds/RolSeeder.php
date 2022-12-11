<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rols')->insert(
            array(
                'name' => 'superadmin',
                'description' => 'Super-Administrador',
            )
        );

        DB::table('rols')->insert(
            array(
                'name' => 'cliente',
                'description' => 'Cliente',
            )
        );

        DB::table('rols')->insert(
            array(
                'name' => 'agent',
                'description' => 'Agente',
            )
        );
    }
}
