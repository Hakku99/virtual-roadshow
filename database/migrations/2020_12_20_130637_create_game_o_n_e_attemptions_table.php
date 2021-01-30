<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameONEAttemptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gameONE_attemptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('participant_id');
            $table->string('participant_name');
            $table->date('attempt_date');
            $table->integer('scores');
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
        Schema::dropIfExists('gameONE_attemptions');
    }
}
