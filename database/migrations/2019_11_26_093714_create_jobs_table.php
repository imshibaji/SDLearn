<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('details')->nullable();
            $table->string('skills')->nullable();
            $table->string('exprience')->nullable();
            $table->string('job_type');
            $table->string('salary')->nullable();
            $table->string('contact_person_name');
            $table->string('contact_person_no');
            $table->string('contact_person_email')->nullable();
            $table->boolean('status');
            $table->boolean('featured')->nullable();
            $table->json('business')->nullable();
            $table->bigInteger('userId');
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
        Schema::dropIfExists('jobs');
    }
}
