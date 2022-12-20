<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeestructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feestructures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('course_id')->unsigned();
            $table->integer('year');
            $table->integer('semister');
            $table->decimal('Full amount');
            $table->decimal('50% deposit');
            $table->date('Due Date');
            $table->decimal('1st instalment');
            $table->date('Due Date 2');
            $table->decimal('2nd instalment');
            $table->date('Due Date 3');

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
        Schema::dropIfExists('feestructures');
    }
}
