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
            'value' => 'CALIDAD'
        ));
        DB::table('general_lists')->insert(array(
            'name' => 'project',
            'value' => 'MEDIOAMBIENTE'
        ));
        DB::table('general_lists')->insert(array(
            'name' => 'project',
            'value' => 'MERCADEOYVENTAS'
        ));
        DB::table('general_lists')->insert(array(
            'name' => 'project',
            'value' => 'TALENTOHUMANO'
        ));
        DB::table('general_lists')->insert(array(
            'name' => 'project',
            'value' => 'CAONTABILIDAD'
        ));
        DB::table('general_lists')->insert(array(
            'name' => 'project',
            'value' => 'LOGISTICA'
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

        DB::table('general_lists')->insert(array(
            'name' => 'event',
            'value' => 'Accidente'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'event',
            'value' => 'Incidente'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'event',
            'value' => 'Enfermedad'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'medical_attention',
            'value' => 'Atención por enfemería o primeros auxilios'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'medical_attention',
            'value' => 'Traslado en Ambulacia u otro medio'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'medical_attention',
            'value' => 'Remisión EPS y/o compromido medico'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'medical_attention',
            'value' => 'Otro'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Prevención accidentes e incidentes laborales',
            'class' => 'HIGIENE Y SEGURIDAD INDUSTRIAL'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Uso y mantenimiento de EPP',
            'class' => 'HIGIENE Y SEGURIDAD INDUSTRIAL'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Almacenamiento seguro',
            'class' => 'HIGIENE Y SEGURIDAD INDUSTRIAL'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Socialización de peligros',
            'class' => 'HIGIENE Y SEGURIDAD INDUSTRIAL'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Actos inseguros',
            'class' => 'HIGIENE Y SEGURIDAD INDUSTRIAL'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Orden y aseo',
            'class' => 'HIGIENE Y SEGURIDAD INDUSTRIAL'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Primeros Auxilios',
            'class' => 'CAPACITACIÓN A BRIGADAS'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Manejo de extintores',
            'class' => 'CAPACITACIÓN A BRIGADAS'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Simulacro',
            'class' => 'CAPACITACIÓN A BRIGADAS'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Capacitación Comité de Emergencias',
            'class' => 'CAPACITACIÓN A BRIGADAS'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Socialización Plan de Emergencias',
            'class' => 'CAPACITACIÓN A BRIGADAS'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Uso de elementos de Protección personal',
            'class' => 'MEDICINA PREVENTIVA Y DEL TRABAJO'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Enfermedades de transmisión sexual',
            'class' => 'MEDICINA PREVENTIVA Y DEL TRABAJO'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Manejo de Residuos',
            'class' => 'MEDICINA PREVENTIVA Y DEL TRABAJO'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Higiene Postural y Manejo de cargas',
            'class' => 'RIESGO BIOMECÁNICO'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Cuidados en la columna',
            'class' => 'RIESGO BIOMECÁNICO'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Pausas activas- Formación de Lideres',
            'class' => 'RIESGO BIOMECÁNICO'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Comunicación Asertiva y Efectiva',
            'class' => 'RIESGO PSICOSOCIAL'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Manejo del Estrés',
            'class' => 'RIESGO PSICOSOCIAL'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Trabajo en Equipo',
            'class' => 'RIESGO PSICOSOCIAL'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Política de SST',
            'class' => 'DOCUMENTOS SG-SST'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Induccion y Reinduccion al SG-sst de la empresa',
            'class' => 'DOCUMENTOS SG-SST'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Capacitación al COPASST en la resolución decreto 2013 de 1986.',
            'class' => 'DOCUMENTOS SG-SST'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Capacitación al COPASST en investigación de accidentes de trabajo.',
            'class' => 'DOCUMENTOS SG-SST'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Capacitación al COPAST  en inspecciones de seguridad',
            'class' => 'DOCUMENTOS SG-SST'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Capacitación al COCOLA  en manejo de conflictos.',
            'class' => 'DOCUMENTOS SG-SST'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'capacitación al COCOLA en la Ley 1010 de 2006 acoso laboral de convivencia.',
            'class' => 'DOCUMENTOS SG-SST'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Capacitacion al COCOLA Inducción CCL',
            'class' => 'DOCUMENTOS SG-SST'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Programa de Higiene y seguridad Industrial',
            'class' => 'DOCUMENTOS SG-SST'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'topic_sst',
            'value' => 'Socialización del impacto del SG_SST',
            'class' => 'DOCUMENTOS SG-SST'
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'inspection_work',
            'value' => 'Administración',
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'inspection_work',
            'value' => 'Producción',
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'support_group',
            'value' => 'COPASST',
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'support_group',
            'value' => 'COCOLAB',
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'support_group',
            'value' => 'BRIGADA DE EMERGENCIAS ',
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'work_activity',
            'value' => 'WORK ACTIVITY',
        ));

        DB::table('general_lists')->insert(array(
            'name' => 'work_type',
            'value' => 'WORK TYPE',
        ));
    }



}
