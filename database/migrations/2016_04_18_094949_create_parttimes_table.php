<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParttimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parttimes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('address');
            $table->string('salary');
            $table->string('time');
            $table->string('required')->nullable();
            $table->string('phone');
            $table->text('content')->nullable();
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
        Schema::drop('parttimes');
    }
}
