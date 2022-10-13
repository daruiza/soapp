<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reports')->insert(array(
            'name' => 'Enero',
            'commerce_id' => null
        ));

        DB::table('reports')->insert(array(
            'name' => 'Febrero',
            'commerce_id' => null
        ));
    }
}
