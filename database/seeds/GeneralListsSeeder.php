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
            'value' => 'm'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'estado',
            'value' => 'Casado'
        ));
    }
}
