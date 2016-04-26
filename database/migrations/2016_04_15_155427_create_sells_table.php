<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30);
            $table->string('img')->nullable();
            $table->integer('price');
            $table->text('content')->nullable();
            $table->string('phone',20)->nullable();
            $table->string('email',30);
            $table->unsignedInteger('user_id');
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
        Schema::drop('sells');
    }
}
