<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();            
            $table->string('activity',255);
            $table->date('date')->nullable()->default(null);            
            $table->boolean('approved')->default(false);            

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
        Schema::dropIfExists('activities');
    }
}


