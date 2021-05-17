<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->string('public')->nullable();
            $table->integer('set_id')->unsigned()->index();

            $table->longText('topleft')->nullable();
            $table->longText('topright')->nullable();
            $table->longText('topmid')->nullable();
            $table->longText('botleft')->nullable();
            $table->longText('botright')->nullable();
            $table->longText('botmid')->nullable();
            $table->longText('midleft')->nullable();
            $table->longText('midright')->nullable();
            $table->longText('midcenter')->nullable();
            $table->longText('midlower')->nullable();
            $table->longText('midupper')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
