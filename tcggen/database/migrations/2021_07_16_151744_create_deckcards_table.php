<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeckcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deckcards', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('deck_id')->unsigned()->index();
            $table->integer('card_id')->unsigned()->index();
            $table->integer('order')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deckcards');
    }
}
