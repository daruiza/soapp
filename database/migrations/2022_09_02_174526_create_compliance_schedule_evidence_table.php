<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplianceScheduleEvidenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compliance_schedule_evidence', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file');
            $table->string('type');
            $table->boolean('approved')->default(0);

            $table->unsignedBigInteger('compliance_schedule_id');

            $table->foreign('compliance_schedule_id')
                ->references('id')
                ->on('compliance_schedule')
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
        Schema::dropIfExists('compliance_schedule_evidence');
    }
}
