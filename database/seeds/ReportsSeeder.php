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
            'name'  => 'primer reporte',
            'project'  => 'SST',
            'responsible'  => 'david',
            'email_responsible'  => 'david@gmail.com',
            'phone_responsible'  => '12345678',
            'date'  => '2020-01-01',
            'commerce_id'  => '1',
        ));

        DB::table('reports')->insert(array(
            'name'  => 'segundo reporte',
            'project'  => 'caida',
            'responsible'  => 'davis',
            'email_responsible'  => 'davis@gmail.com',
            'phone_responsible'  => '123456789',
            'date'  => '2020-01-01',
            'commerce_id'  => '2',
        ));

        DB::table('reports')->insert(array(
            'name'  => 'tercer reporte',
            'project'  => 'falta',
            'responsible'  => 'giovanni',
            'email_responsible'  => 'giovanni@gmail.com',
            'phone_responsible'  => '12345678',
            'date'  => '2020-01-01',
            'commerce_id'  => '3',
        ));
    }
}
