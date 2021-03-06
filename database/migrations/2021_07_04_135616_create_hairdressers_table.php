<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHairdressersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hairdressers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->string('hair_title');
            $table->string('hair_talk')->nullable();; //追記！！！
            $table->string('hair_tag')->nullable();; //追記！！！
            $table->string('img_url')->nullable(); //追記！！！
            $table->string('img_url2')->nullable(); //追記！！！
            $table->string('img_url3')->nullable(); //追記！！！
            $table->string('hair_movie')->nullable(); //追記！！！
            $table->date('arrivedate');
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
        Schema::dropIfExists('hairdressers');
    }
}
