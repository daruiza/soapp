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
            'project'  => 'SST',
            'progress'  => 21,
            'responsible'  => 'david',
            'email_responsible'  => 'david@gmail.com',
            'phone_responsible'  => '12345678',
            'date'  => '2022-01-01',
            'commerce_id'  => '1',
        ));

        DB::table('reports')->insert(array(
            'project'  => 'CAIDAD',
            'progress'  => 74,
            'responsible'  => 'Fernando',
            'email_responsible'  => 'davis@gmail.com',
            'phone_responsible'  => '3194052663',
            'date'  => '2022-01-01',
            'commerce_id'  => '2',
        ));

        DB::table('reports')->insert(array(
            'project'  => 'SST',
            'progress'  => 49,
            'responsible'  => 'Hernando',
            'email_responsible'  => 'hernando@gmail.com',
            'phone_responsible'  => '3194056987',
            'date'  => '2022-02-01',
            'commerce_id'  => '2',
        ));

        DB::table('reports')->insert(array(
            'project'  => 'MEDIOAMBIENTE',
            'progress'  => 16,
            'responsible'  => 'giovanni',
            'email_responsible'  => 'giovanni@gmail.com',
            'phone_responsible'  => '12345678',
            'date'  => '2022-04-01',
            'commerce_id'  => '3',
        ));
    }
}
