<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BiddingTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biddingTransaction', function (Blueprint $table) {
            $table->integer('projectID');
            $table->integer('userID');
            $table->string('biddingShortMessage');
            $table->integer('biddingAmmount');
            $table->integer('isWinner');
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
        Schema::dropIfExists('biddingTransaction');
    }
}
