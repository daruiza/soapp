<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipementMaintenanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipement_maintenance', function (Blueprint $table) {
            $table->id();
            $table->boolean('buildings')->default(0);
            $table->boolean('tools')->default(0);
            $table->boolean('teams')->default(0);
            $table->date('date')->nullable()->default(null);
            $table->string('observations')->nullable();
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
        Schema::dropIfExists('equipement_maintenance');
    }
}
