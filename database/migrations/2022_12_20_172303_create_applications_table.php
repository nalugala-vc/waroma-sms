<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->unsigned();
            $table->string('picture');
            $table->string('name');
            $table->integer('year');
            $table->integer('semester');
            $table->string('email');
            $table->integer('age');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('former_highschool');
            $table->string('KCSE_Grade');
            $table->String('KCSE_points');
            $table->string('parent_name');
            $table->string('parent_email');
            $table->string('parent_no');
            $table->string('home_location');
            $table->string('student_description');

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
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
        Schema::dropIfExists('applications');
    }
}
