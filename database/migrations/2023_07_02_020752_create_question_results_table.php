<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_results', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('user_id')->unique();
            $table->integer('q1')->nullable();
            $table->integer('q2')->nullable();
            $table->integer('q3')->nullable();
            $table->integer('q4')->nullable();
            $table->integer('q5')->nullable();
            $table->integer('q6')->nullable();
            $table->integer('result')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_results');
    }
}
