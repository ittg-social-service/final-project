<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key');

            $table->integer('tutor_id')->unsigned();
            $table->foreign('tutor_id')->references('id')->on('tutors');
            $table->integer('period_id')->unsigned();
            $table->foreign('period_id')->references('id')->on('periods');
            $table->integer('coordinator_id')->unsigned();
            $table->foreign('coordinator_id')->references('id')->on('coordinators');
            /*$table->softDeletes();*/
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
        Schema::dropIfExists('groups');
    }
}
