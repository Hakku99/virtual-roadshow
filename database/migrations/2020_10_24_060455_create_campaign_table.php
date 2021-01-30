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
			$table->text('image_name');
            $table->boolean('quiz');
            $table->integer('quiz_id')->nullable();
			$table->boolean('status');
			$table->boolean('banner');
			$table->boolean('quiz_status');
			$table->text('video_link');
			$table->text('contact_number');
			$table->text('contact_email');
            $table->boolean('deleted');
            $table->integer('created_by');
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
        Schema::dropIfExists('campaign');
    }
}
