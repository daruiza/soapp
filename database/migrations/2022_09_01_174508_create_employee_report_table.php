<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_report', function (Blueprint $table) {
            $table->id();
            $table->string('employee_state')->nullable()->default('Pendiente');
            $table->string('object')->nullable()->default('{}');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('report_id');

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onDelete('cascade');
            $table->foreign('report_id')
                ->references('id')
                ->on('reports')
                ->onDelete('cascade');

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
        Schema::dropIfExists('employee_report');
    }
}
