<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('yname')->nullable();
            $table->string('yemail')->nullable();
            $table->string('c_name')->nullable();
            $table->string('c_email')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('interest')->nullable();
            $table->string('time_frame')->nullable();
            $table->string('message')->nullable();
            $table->string('ticket')->nullable();
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
        Schema::dropIfExists('quotes');
    }
}
