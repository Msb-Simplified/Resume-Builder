<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->text('about')->nullable();
            $table->text('address')->nullable();
            $table->string('profile')->nullable();
            $table->string('education')->nullable();
            $table->string('experence')->nullable();
            $table->string('skill')->nullable();
            $table->string('lang_show')->nullable();
            $table->json('language')->nullable();
            $table->string('tools_show')->nullable();
            $table->json('tools')->nullable();

            
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resumes');
    }
}
