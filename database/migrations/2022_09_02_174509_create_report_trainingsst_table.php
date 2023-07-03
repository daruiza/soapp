<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportTrainingsstTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainingsst', function (Blueprint $table) {
            $table->id();            
            $table->string('topic');
            $table->date('date')->nullable()->default(null);;
            $table->integer('hours')->default(0);
            $table->integer('assistants')->default(0);

            $table->unsignedBigInteger('report_id');
            
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
        Schema::dropIfExists('trainingsst');
    }
}


