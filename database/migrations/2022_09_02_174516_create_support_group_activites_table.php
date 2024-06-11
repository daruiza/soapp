<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportGroupActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_group_activities', function (Blueprint $table) {
            $table->id();
            $table->string('support_group', 128);
            $table->date('date_meet')->nullable()->default(null);                        
            $table->string('responsible')->nullable();     
            $table->string('tasks_copasst')->nullable();     
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
        Schema::dropIfExists('support_group_activities');
    }
}
