<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralListsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('general_lists')->insert(array(
            'name' => 'Sexo',
            'value' => 'Masculino'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'Sexo',
            'value' => 'Femenino'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'Estado',
            'value' => 'Casado'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'Estado',
            'value' => 'Divorsiado'
        ));
    }
}
