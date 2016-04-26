<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_number')->unique();
            $table->string('name');
            $table->string('teacher');
            $table->string('time');
            $table->string('phone')->nullable();
            $table->integer('course_id');
            $table->boolean('accepted')->default(false);
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
        Schema::drop('course_comments');
    }
}
