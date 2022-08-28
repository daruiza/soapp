<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rols')->insert(
            array(
                'name' => 'Super-Administrador',
                'description' => 'superAdmin',
                'label' => '{"options":["editProfile","passwordChange","acountSummary","termsConditions"]}'
            )
        );

        DB::table('rols')->insert(
            array(
                'name' => 'Propietario',
                'description' => 'propietario',
                'label' => '{"options":["editProfile","editStore","passwordChange"],"options_dashboard":["consultClousure","editClousure"]}'
            )
        );

        DB::table('rols')->insert(
            array(
                'name' => 'Cliente',
                'description' => 'cliente',
                'label' => '{"options":["editProfile","passwordChange"],"options_dashboard":["sendMessage"]}'
            )
        );
    }
}
