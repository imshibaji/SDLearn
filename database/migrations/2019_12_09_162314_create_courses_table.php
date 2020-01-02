<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 191);
            $table->string('slag', 191);
            $table->string('courseid', 10)->nullable();
            $table->text('details')->nullable();
            $table->string('meta_keys')->nullable();
            $table->string('meta_desc')->nullable();
            $table->json('duration')->nullable();
            $table->integer('short')->nullable();
            $table->string('status', 10);
            $table->string('premium_status', 10);
            $table->float('price')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('courses');
    }
}
