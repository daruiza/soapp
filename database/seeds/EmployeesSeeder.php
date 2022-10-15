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
            'identification_type' => 'Cédula Ciudadania',
            'identification' => '1039450689',
            'name' => 'Pedro',
            'lastname' => 'Paramo',
            'email' => 'paramo.pedro@gmail',
            'birth_date' => '2000-01-01',
            'phone' => '215478596',
            'adress' => 'San Pedro',
            'photo' => 'avatar',
            'commerce_id'=> 1
        ));

        DB::table('employees')->insert(array(
            'identification_type' => 'Cédula Ciudadania',
            'identification' => '1039450648',
            'name' => 'Jose',
            'lastname' => 'Saramago',
            'email' => 'saramago.jose@gmail',
            'birth_date' => '1990-01-01',
            'phone' => '2154716',
            'adress' => 'San Jose',
            'photo' => 'avatar',
            'commerce_id'=> 1
        ));

        DB::table('employees')->insert(array(
            'identification_type' => 'Cédula Ciudadania',
            'identification' => '1039785458',
            'name' => 'Teo',
            'lastname' => 'Rua',
            'email' => 'rua.jose@gmail',
            'birth_date' => '1990-01-01',
            'phone' => '2154716',
            'adress' => 'San Jose',
            'photo' => 'avatar',
            'commerce_id'=> 1
        ));

        DB::table('employees')->insert(array(
            'identification_type' => 'Cédula Ciudadania',
            'identification' => '1039783692',
            'name' => 'Valentino',
            'lastname' => 'Cervantes',
            'email' => 'valentino.jose@gmail',
            'birth_date' => '1990-01-01',
            'phone' => '2154716',
            'adress' => 'San Jose',
            'photo' => 'avatar',
            'commerce_id'=> 2
        ));
    }
}
