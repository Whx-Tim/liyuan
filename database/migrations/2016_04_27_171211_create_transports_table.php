<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address');
            $table->string('time');
            $table->integer('reward')->nullable();
            $table->string('company');
            $table->string('info')->nullable();
            $table->string('consignee');
            $table->string('phone');
            $table->string('ConsigneeAddress');
            $table->boolean('condition')->default(false);
            $table->integer('user_id');
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
        Schema::drop('transports');
    }
}
