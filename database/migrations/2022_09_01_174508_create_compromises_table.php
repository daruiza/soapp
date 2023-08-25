<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompromisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compromises', function (Blueprint $table) {
            $table->id();            
            $table->string('item',16);
            $table->string('rule',32);
            $table->string('name');
            $table->string('detail');
            $table->boolean('canon',true);
            $table->date('dateinit')->nullable()->default(null);            
            $table->date('dateclose')->nullable()->default(null);            
            
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
        Schema::dropIfExists('compromises');
    }
}


