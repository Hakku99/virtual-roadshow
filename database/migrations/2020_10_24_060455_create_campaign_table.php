<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('section1');
            $table->text('section2')->nullable();
            $table->text('section3')->nullable();
            $table->boolean('quiz');
            $table->integer('quiz_id')->nullable();
            $table->boolean('deleted');
            $table->integer('created_by');
            $table->timestamps('created_at');
            $table->timestamps('updated_at');
            $table->text('image_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaign');
    }
}
