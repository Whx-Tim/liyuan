<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('losts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('info');
            $table->text('content')->nullable();
            $table->string('type');
            $table->string('address');
            $table->string('phone');
            $table->integer('user_id');
            $table->boolean('condition')->default(false);
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
        Schema::drop('losts');
    }
}
