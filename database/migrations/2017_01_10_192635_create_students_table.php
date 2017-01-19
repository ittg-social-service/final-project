<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('period_id')->unsigned();
            $table->foreign('period_id')->references('id')->on('periods');
            $table->integer('group_id')->unsigned()->nullable();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('set null');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('career_id')->unsigned();
            $table->foreign('career_id')->references('id')->on('careers');
            $table->integer('semester_id')->unsigned()->default('0');
            $table->foreign('semester_id')->references('id')->on('semesters');
            $table->timestamps();
        });

        Schema::create('activity_student_teacher', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');

            $table->integer('activity_id')->unsigned();
            $table->foreign('activity_id')->references('id')->on('activities');

            $table->integer('tutor_id')->unsigned();
            $table->foreign('tutor_id')->references('id')->on('tutors');

            $table->integer('group_id');
            $table->string('file');
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
        Schema::dropIfExists('students');
    }
}
