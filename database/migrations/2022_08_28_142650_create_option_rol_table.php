<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_rol', function (Blueprint $table) {
            $table->timestamps();
            $table->unsignedBigInteger('rol_id')->unsigned()->nullable();
            $table->unsignedBigInteger('option_id')->unsigned()->nullable();
            $table->foreign('rol_id')->references('id')->on('rols')->onDelete('set null')
                ->onUpdate('cascade');
            $table->foreign('option_id')->references('id')->on('options')->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_rol');
    }
}
