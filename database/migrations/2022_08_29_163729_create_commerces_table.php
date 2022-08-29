<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommercesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commerces', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 128)->nullable()->default(null);
            $table->string('nit', 128)->nullable()->default(null);
            $table->string('department', 128)->nullable()->default(null);
            $table->string('city', 128)->nullable()->default(null);
            $table->string('adress', 256)->nullable()->default(null);
            $table->string('description', 512)->nullable()->default(null);
            $table->string('logo', 256)->default('default.png');
            $table->string('currency', 32)->default('COP');
            $table->string('country', 16)->default('CO');
            $table->string('label', 1024)->nullable()->default('');
            $table->string('apiLogin', 128)->nullable()->default('');
            $table->string('apiKey', 128)->nullable()->default('');
            $table->string('EPapiKey', 128)->nullable()->default('');
            $table->string('EPprivateKey', 128)->nullable()->default('');
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->unsignedBigInteger('user_id')->unique()->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commerces');
    }
}
