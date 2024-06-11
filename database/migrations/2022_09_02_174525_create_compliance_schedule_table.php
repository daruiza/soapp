<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplianceScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compliance_schedule', function (Blueprint $table) {
            $table->id();
            $table->string('company')->nullable();
            $table->unsignedInteger('planned_activities')->default(0);
            $table->unsignedInteger('executed_activities')->default(0);
            $table->unsignedInteger('compliance')->default(0);            
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
        Schema::dropIfExists('compliance_schedule');
    }
}
