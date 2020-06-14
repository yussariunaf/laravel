<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('training_id')->nullable();
            $table->foreign('training_id')->references('id')->on('trainings');

            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('students');

            $table->unsignedBigInteger('faculty_id')->nullable();
            $table->foreign('faculty_id')->references('id')->on('faculties');

            $table->unsignedBigInteger('major_id')->nullable();
            $table->foreign('major_id')->references('id')->on('majors');

            $table->text('ticket_code');
            $table->integer('present')->default(0);
            // $table->integer('absent')->default(0);

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
        Schema::dropIfExists('student_tickets');
    }
}
