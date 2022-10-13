<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert(array(
            'id' => '15327400',
            'name' => 'Pedro',
            'lastname' => 'Paramo',
            'email' => 'paramo.pedro@gmail',
            'birth_date' => '2000-01-01',
            'phone' => '215478596',
            'adress' => 'San Pedro',
            'photo' => 'avatar',
        ));

        DB::table('employees')->insert(array(
            'id' => '123456789',
            'name' => 'Jose',
            'lastname' => 'Saramago',
            'email' => 'saramago.jose@gmail',
            'birth_date' => '1990-01-01',
            'phone' => '2154716',
            'adress' => 'San Jose',
            'photo' => 'avatar',
        ));
    }
}
