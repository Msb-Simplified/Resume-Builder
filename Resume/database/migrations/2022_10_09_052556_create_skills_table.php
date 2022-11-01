<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('resume_id')->constrained('resumes'); 
            // This works as smae as below comment

            $table->string('subject');
            $table->string('percent');
            $table->timestamps();

            // $table->unsignedBigInteger('resume_id');
            // $table->foreign('resume_id')->references('id')->on('resumes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skills');
    }
}
