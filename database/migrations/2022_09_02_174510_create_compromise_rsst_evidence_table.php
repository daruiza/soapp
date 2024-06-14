<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompromiseRSSTEvidenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compromise_rsst_evidences', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file');
            $table->string('type');
            $table->boolean('approved')->default(0);
            
            $table->unsignedBigInteger('compromise_id');
            
            $table->foreign('compromise_id')
                ->references('id')
                ->on('compromises_rsst')
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
        Schema::dropIfExists('compromise_rsst_evidences');
    }
}


