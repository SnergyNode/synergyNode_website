<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('ip')->nullable();
            $table->longText('device')->nullable();
            $table->longText('region')->nullable();
            $table->longText('city')->nullable();
            $table->longText('country')->nullable();
            $table->longText('url')->nullable();
            $table->bigInteger('time')->nullable();
            $table->bigInteger('hit')->nullable();
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
        Schema::dropIfExists('visits');
    }
}
