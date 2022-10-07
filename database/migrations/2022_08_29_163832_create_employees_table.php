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
            $table->id('id');
            $table->string('identification_type', 128);
            $table->string('identification', 128);
            $table->string('name', 128);
            $table->string('lastname', 128)->nullable()->default(null);
            $table->string('email')->unique();
            $table->date('birth_date', 128)->nullable()->default(null);
            $table->string('phone', 128)->nullable()->default(null);
            $table->string('photo', 128)->nullable()->default(null);
            $table->string('adress', 256)->nullable()->default(null);
            $table->boolean('active')->default(true);
            $table->timestamp('email_verified_at')->nullable();
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
