<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 60)->nullable();
            $table->string('label')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->unsignedBigInteger('module_id')->unsigned()->nullable();
            $table->foreign('module_id')->references('id')->on('modules')
                ->onDelete('set null')
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
        Schema::dropIfExists('options');
    }
}
