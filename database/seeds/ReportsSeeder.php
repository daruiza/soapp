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
            'project' => 'SST',
            'commerce_id' => null
        ));

        DB::table('reports')->insert(array(
            'project' => 'CAIDA',
            'commerce_id' => null
        ));

        DB::table('reports')->insert(array(
            'project' => 'MEDIO HAMBIENTE',
            'commerce_id' => null
        ));
    }
}
