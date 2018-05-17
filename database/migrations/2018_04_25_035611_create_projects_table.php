<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->increments('projectID');
            $table->integer('userID');
            $table->integer('propertyKindID');
            $table->string('projectTitle',4000)->nullable();
            $table->string('projectDesc',4000)->nullable();
            $table->integer('postalCode')->nullable();
            $table->integer('minBudget')->nullable();
            $table->integer('maxBudget')->nullable();
            $table->datetime('openBidDate')->nullable();
            $table->datetime('closedBidDate')->nullable();
            $table->datetime('projectStart')->nullable();
            $table->datetime('projectEnd')->nullable();
            $table->tinyInteger('isMaterial')->nullable();
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
        Schema::dropIfExists('project');
    }
}
