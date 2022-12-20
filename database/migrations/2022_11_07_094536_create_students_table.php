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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('picture');
            $table->integer('course_id')->unsigned();
            $table->integer('year');
            $table->integer('semister');
            $table->string('phone_number');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('gender');
            $table->string('parent_name');
            $table->string('parent_email');
            $table->string('parent_number');
            $table->string('home_location');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
        
        DB::statement('ALTER TABLE students AUTO_INCREMENT = 10000; ');

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
