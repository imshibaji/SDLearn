<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserAssesmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_assesments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('topic_assignment_id');
            $table->integer('user_id');
            $table->integer('course_id');
            $table->integer('topic_id');
            $table->integer('question_id');
            $table->string('answers');
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
        Schema::dropIfExists('user_assesments');
    }
}
