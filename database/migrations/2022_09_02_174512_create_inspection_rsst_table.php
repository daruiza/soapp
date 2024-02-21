<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectionRSSTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspection_rsst', function (Blueprint $table) {
            $table->id();
            $table->string('work', 128);
            $table->boolean('machines')->default(0);
            $table->boolean('vehicles')->default(0);
            $table->boolean('tools')->default(0);
            $table->boolean('epp')->default(0);
            $table->boolean('cleanliness')->default(0);
            $table->boolean('chemicals')->default(0);
            $table->boolean('risk_work')->default(0);
            $table->boolean('emergency_item')->default(0);
            $table->string('other')->nullable();
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
        Schema::dropIfExists('inspection_rsst');
    }
}
