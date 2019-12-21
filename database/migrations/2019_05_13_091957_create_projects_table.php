<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            /**
             * task table should have: project_id, notes table should have: project_id
             */
            $table->increments('id');
            $table->integer('type')->nullable(); //type [1 - project: has tasks, 2 - simpleTask: has no task]
            $table->bigInteger('start_date')->nullable();
            $table->bigInteger('due_date')->nullable();
            $table->float('cost')->nullable();
            $table->longText('details')->nullable();
            $table->text('title')->nullable();
            $table->text('status')->nullable(); //ongoing, paused, completed, cancled, etc
            $table->text('project_admin')->nullable();
            $table->string('unid')->nullable();
            $table->integer('priority')->nullable(); // 1-5
            $table->integer('client_id')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
