<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resume_id');
            $table->string('image')->default("1");
            $table->string('name')->default("1");
            $table->string('title')->default("1");
            $table->text('about')->default("1");
            $table->text('address')->default("1");
            $table->string('profile')->default("1");
            $table->string('education')->default("1");
            $table->string('experence')->default("1");
            $table->string('skill')->default("1");
            $table->json('language')->default("1");
            $table->json('tools')->default("1");
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
        Schema::dropIfExists('settings');
    }
}
