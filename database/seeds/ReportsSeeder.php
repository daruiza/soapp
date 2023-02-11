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
            'responsible'  => 'Agente01',
            'email_responsible'  => 'Agente01@gmail.com',
            'phone_responsible'  => '12345678',
            'date'  => '2023-01-01',
            'commerce_id'  => '1',
        ));

        DB::table('reports')->insert(array(
            'project'  => 'CAIDAD',
            'progress'  => 74,
            'responsible'  => 'Agente01',
            'email_responsible'  => 'Agente01@gmail.com',
            'phone_responsible'  => '3194052663',
            'date'  => '2023-01-01',
            'commerce_id'  => '2',
        ));

        DB::table('reports')->insert(array(
            'project'  => 'SST',
            'progress'  => 49,
            'responsible'  => 'Agente01',
            'email_responsible'  => 'Agente01@gmail.com',
            'phone_responsible'  => '3194056987',
            'date'  => '2023-02-01',
            'commerce_id'  => '2',
        ));

        DB::table('reports')->insert(array(
            'project'  => 'MEDIOAMBIENTE',
            'progress'  => 16,
            'responsible'  => 'Agente',
            'email_responsible'  => 'Agente@gmail.com',
            'phone_responsible'  => '12345678',
            'date'  => '2023-04-01',
            'commerce_id'  => '3',
        ));
    }
}
