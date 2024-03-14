<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorrectiveMonitoringRSSTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corrective_monitoring_rsst', function (Blueprint $table) {
            $table->id();
            $table->string('work', 128);
            $table->boolean('corrective_action')->default(0);
            $table->date('date')->nullable()->default(null);
            $table->boolean('executed')->default(0);            
            $table->string('observations')->nullable();     
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
        Schema::dropIfExists('corrective_monitoring_rsst');
    }
}
