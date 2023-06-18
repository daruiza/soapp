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
            'name' => 'boolean',
            'value' => 'Si'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'boolean',
            'value' => 'No'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'sexo',
            'value' => 'Masculino'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'sexo',
            'value' => 'Femenino'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'estadocivil',
            'value' => 'Soltero'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'estadocivil',
            'value' => 'Casado'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'estadocivil',
            'value' => 'Divorciado'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'documenttype',
            'value' => 'Cédula Ciudadanía'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'documenttype',
            'value' => 'Cedula Extranjera'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'documenttype',
            'value' => 'Pasaporte'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'documenttype',
            'value' => 'Tarjeta Identidad'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'documenttype',
            'value' => 'NIT'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'employee_state',
            'value' => 'Pendiente'
        ));
        
        DB::table('general_lists')->insert(array(
            'name' => 'employee_state',
            'value' => 'Nuevo Ingreso'
        ));


        DB::table('general_lists')->insert(array(
            'name' => 'employee_state',
            'value' => 'Inducción'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'employee_state',
            'value' => 'Exámenes Medicos Ingreso'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'employee_state',
            'value' => 'Exámenes Medicos Periódico'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'employee_state',
            'value' => 'Exámenes Medicos Retiro'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'employee_state',
            'value' => 'Retirado'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'employee_state',
            'value' => 'Producción'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'month',
            'index' => 1,
            'value' => 'Enero'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'month',
            'index' => 2,
            'value' => 'Febrero'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'month',
            'index' => 3,
            'value' => 'Marzo'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'month',
            'index' => 4,
            'value' => 'Abril'
        ));
        DB::table('general_lists')->insert(array(
            'name' => 'month',
            'index' => 5,
            'value' => 'Mayo'
        ));
        DB::table('general_lists')->insert(array(
            'name' => 'month',
            'index' => 6,
            'value' => 'Junio'
        ));
        DB::table('general_lists')->insert(array(
            'name' => 'month',
            'index' => 7,
            'value' => 'Julio'
        ));
        DB::table('general_lists')->insert(array(
            'name' => 'month',
            'index' => 8,
            'value' => 'Agosto'
        ));
        DB::table('general_lists')->insert(array(
            'name' => 'month',
            'index' => 9,
            'value' => 'Septiembre'
        ));
        DB::table('general_lists')->insert(array(
            'name' => 'month',
            'index' => 10,
            'value' => 'Octubre'
        ));
        DB::table('general_lists')->insert(array(
            'name' => 'month',
            'index' => 11,
            'value' => 'Noviembre'
        ));
        DB::table('general_lists')->insert(array(
            'name' => 'month',
            'index' => 12,
            'value' => 'Diciembre'
        ));
        DB::table('general_lists')->insert(array(
            'name' => 'project',
            'value' => 'SST'
        ));
        DB::table('general_lists')->insert(array(
            'name' => 'project',
            'value' => 'CAIDAD'
        ));
        DB::table('general_lists')->insert(array(
            'name' => 'project',
            'value' => 'MEDIOAMBIENTE'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'type_exam',
            'value' => 'Ingreso'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'type_exam',
            'value' => 'Periódico'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'type_exam',
            'value' => 'Retiro'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'exam',
            'value' => 'Visiometría'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'exam',
            'value' => 'Audiometría'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'exam',
            'value' => 'Espicometría'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'exam',
            'value' => 'Otro'
        ));
    }

}
