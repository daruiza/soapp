<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectionRSSTEvidenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspection_rsst_evidences', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file');
            $table->string('type');
            $table->boolean('approved')->default(0);

            $table->unsignedBigInteger('inspection_id');

            $table->foreign('inspection_id')
                ->references('id')
                ->on('inspection_rsst')
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
        Schema::dropIfExists('inspection_rsst_evidences');
    }
}
