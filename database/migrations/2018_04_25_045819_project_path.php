<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectPath extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectPath', function (Blueprint $table) {
            $table->increments('projectPathID');
            $table->integer('projectID');
            $table->string('fileName',4000)->nullable();
            $table->string('originalName',4000)->nullable();
            $table->decimal('fileSize',18,2)->nullable();
            $table->string('uploadPath',4000)->nullable();
            $table->string('downloadPath',4000)->nullable();
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
        Schema::dropIfExists('projectPath');
    }
}
