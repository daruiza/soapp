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
			'document_type' => 1,
			'user_id' => 3,
			'commerce_id' => 1
		));

		DB::table('employees')->insert(array(
			'document_type' => 1,
			'user_id' => 4,
			'commerce_id' => 1
		));
	}
}
