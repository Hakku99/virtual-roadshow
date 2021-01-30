<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('question1');
            $table->text('question2');
            $table->text('question3');
            $table->text('question4');
            $table->text('question5');
            $table->text('question6')->nullable();
            $table->text('question7')->nullable();
            $table->text('question8')->nullable();
            $table->text('question9')->nullable();
            $table->text('question10')->nullable();
            $table->text('answer_for_question1');
            $table->text('answer_for_question2');
            $table->text('answer_for_question3');
            $table->text('answer_for_question4');
            $table->text('answer_for_question5');
            $table->text('answer_for_question6')->nullable();
            $table->text('answer_for_question7')->nullable();
            $table->text('answer_for_question8')->nullable();
            $table->text('answer_for_question9')->nullable();
            $table->text('answer_for_question10')->nullable();
            $table->integer('campaign_id')->nullable();
            $table->boolean('deleted');
            $table->integer('created_by');
            $table->timestamps('created_at');
            $table->timestamps('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz');
    }
}
