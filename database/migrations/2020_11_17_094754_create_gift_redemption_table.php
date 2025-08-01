<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftRedemptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gift_redemption', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('gift_id');
            $table->boolean('approved');
            $table->boolean('delivered');
			$table->boolean('cancelled');
			$table->boolean('delivering');
			$table->text('f_reason')->nullable();
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
        Schema::dropIfExists('gift_redemption');
    }
}
