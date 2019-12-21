<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerteds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alert_id')->nullable();
            $table->string('alert_key')->nullable();
            $table->integer('user_id')->nullable();
            $table->boolean('seen')->nullable();

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
        Schema::dropIfExists('alerteds');
    }
}
