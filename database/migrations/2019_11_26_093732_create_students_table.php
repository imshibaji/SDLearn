<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('photo_link')->nullable();
            $table->string('name');
            $table->json('courses')->nullable();
            $table->tinyInteger('avarage_course_rating')->nullable();
            $table->string('job_title');
            $table->string('job_skills');
            $table->string('hire_status');
            $table->text('about_yourself');
            $table->json('projects')->nullable();
            $table->json('expriences')->nullable();
            $table->tinyInteger('project_rating')->nullable();
            $table->tinyInteger('achievement_rating')->nullable();
            $table->string('expected_salary')->nullable();
            $table->string('no_of_exprience')->nullable();
            $table->string('email');
            $table->string('skype')->nullable();
            $table->string('mobile');
            $table->string('whatsapp')->nullable();
            $table->string('website')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('pincode');
            $table->bigInteger('userId');
            $table->boolean('status');
            $table->boolean('varified')->nullable();
            $table->bigInteger('create_by_stuffId');
            $table->bigInteger('maintain_by_stuffId');
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
        Schema::dropIfExists('students');
    }
}
