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
            'name' => 'sexo',
            'value' => 'Masculino'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'sexo',
            'value' => 'Femenino'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'estadocivil',
            'value' => 'Casado'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'estadocivil',
            'value' => 'Divorsiado'
        ));
    }
}
