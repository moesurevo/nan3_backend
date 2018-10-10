<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('questionid')->unsigned();
            $table->string('answereng');
            $table->string('answermm');
            $table->string('point');
            $table->integer('serial_no');
            $table->timestamps();
            $table->foreign('questionid')->references('id')->on('questions')->onDelete('cascade');
            $table->index(['questionid','serial_no']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
