<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('course_number');
            $table->string('name');
            $table->string('time');
            $table->string('teacher');
            $table->string('want_name')->nullable();
            $table->string('want_teacher')->nullable();
            $table->string('phone')->nullable();
            $table->string('email');
            $table->integer('user_id');
            $table->boolean('condition')->default(false);
            $table->integer('count')->default(0);
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
        Schema::drop('courses');
    }
}
