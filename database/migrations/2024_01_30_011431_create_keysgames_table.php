<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeysgamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keysgames', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('no')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('key')->nullable();
            $table->integer('game_id')->nullable();
            $table->integer('key_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('keysgames');
    }
}
