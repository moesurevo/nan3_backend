<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quizid')->unsigned();
            $table->string('resulteng');
            $table->string('resultmm');
            $table->integer('pointminimum');
            $table->integer('pointmaximum');
            $table->string('video_url')->nullable();;
            $table->timestamps();
            $table->foreign('quizid')->references('id')->on('quiztitles')->onDelete('cascade');
            $table->index(['quizid']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
