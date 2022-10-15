<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->string('lastname', 128)->nullable()->default(null);
            $table->string('identification', 128);
            $table->string('identification_type', 128)->default('Cedula de Ciudadania');
            $table->string('email')->unique();
            $table->date('birth_date')->nullable()->default(null);
            $table->string('phone', 128)->nullable()->default(null);
            $table->string('photo', 128)->nullable()->default(null);
            $table->string('adress', 256)->nullable()->default(null);
            $table->boolean('is_employee')->default(true);
            $table->boolean('active')->default(true);
            $table->integer('commerce_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
