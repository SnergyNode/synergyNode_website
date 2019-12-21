<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSynergiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('synergies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('facebook')->nullable();
            $table->string('linkd')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('google')->nullable();
            $table->string('youtube')->nullable();
            $table->string('tel1')->nullable();
            $table->string('tel2')->nullable();
            $table->string('mail1')->nullable(); //info
            $table->string('mail2')->nullable(); //support
            $table->string('about')->nullable();
            $table->string('about_acr')->nullable();
            $table->string('service')->nullable();
            $table->string('service_acr')->nullable();
            $table->string('work')->nullable();
            $table->string('work_acr')->nullable();
            $table->string('client')->nullable();
            $table->string('client_acr')->nullable();
            $table->string('contact')->nullable();
            $table->string('contact_acr')->nullable();
            $table->longText('adrs')->nullable();
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
        Schema::dropIfExists('synergies');
    }
}
