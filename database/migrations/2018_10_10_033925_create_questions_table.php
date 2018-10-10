<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quiztitleid')->unsigned();
            $table->string('questioneng');
            $table->string('questionmm');
            $table->integer('serial_no');
            $table->timestamps();
            $table->foreign('quiztitleid')->references('id')->on('quiztitles')->onDelete('cascade');
            $table->index(['quiztitleid','serial_no']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
