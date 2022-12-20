<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('courses_id')->unsigned();
            $table->integer('year');
            $table->integer('semister');
            $table->string('day');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('units_id')->unsigned();
            $table->integer('lecturers_id')->unsigned();
            $table->string('equipments');

            $table->foreign('lecturers_id')->references('id')->on('lecturers')->onDelete('cascade');
            $table->foreign('courses_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('units_id')->references('id')->on('units')->onDelete('cascade');
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
        Schema::dropIfExists('schedules');
    }
}
