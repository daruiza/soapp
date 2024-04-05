<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_management', function (Blueprint $table) {
            $table->id();
            $table->string('activity', 128);
            $table->string('work_type', 128);
            $table->unsignedInteger('workers_activity')->default(0);
            $table->unsignedInteger('workers_trained')->default(0);
            $table->boolean('permissions')->default(0);
            $table->unsignedBigInteger('report_id');
            $table->string('observations')->nullable();
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
        Schema::dropIfExists('work_management');
    }
}
