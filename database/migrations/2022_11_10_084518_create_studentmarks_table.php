<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentmarks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_id')->unsigned();
            $table->integer('class_id')->unsigned();
            $table->integer('unit_id')->unsigned();
            $table->string('name');
            $table->decimal('student_marks');
            $table->decimal('Max marks');
            $table->decimal('weight');

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
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
        Schema::dropIfExists('studentmarks');
    }
}
