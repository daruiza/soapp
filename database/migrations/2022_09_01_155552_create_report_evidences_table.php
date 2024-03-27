<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportEvidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evidences', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file');
            $table->string('type');
            $table->boolean('approved')->default(0);
            
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
        Schema::dropIfExists('evidences');
    }
}


