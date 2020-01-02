<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStuffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stuffs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state');
            $table->string('country');
            $table->string('pincode');
            $table->string('job_role')->nullable();
            $table->string('salary')->nullable();
            $table->tinyInteger('skills_points')->nullable();
            $table->tinyInteger('willing_points')->nullable();
            $table->tinyInteger('performance_point')->nullable();
            $table->timestamp('joining_date')->nullable();
            $table->timestamp('terminate_date')->nullable();
            $table->boolean('status');
            $table->bigInteger('userId');
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
        Schema::dropIfExists('stuffs');
    }
}
