<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('code');
            $table->string('name');
            $table->string('location');
            $table->dateTime('begin');
            $table->dateTime('ended');
            $table->dateTime('registration_end');
            $table->string('trainer');
            $table->string('status'); // soon, ongoing, ended
            $table->string('kuota');
            $table->char('header');
            $table->text('body');
            $table->json('majors');
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
        Schema::dropIfExists('trainings');
    }
}
