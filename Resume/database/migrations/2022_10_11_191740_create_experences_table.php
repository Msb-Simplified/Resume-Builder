<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resume_id');

            $table->string('subject')->nullable();
            $table->string('details')->nullable();

            $table->foreign('resume_id')->references('id')->on('resumes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experences');
    }
}
