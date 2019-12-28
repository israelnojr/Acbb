<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('towns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('state_id')->unsigned();
            $table->bigInteger('local_government_id')->unsigned();
            $table->string('name');

            //foreign keyss
            // $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            // $table->foreign('local_government_id')->references('id')->on('local_governments')->onDelete('cascade');

            $table->timestamps();

            $table->index('state_id');
            $table->index('local_government_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('towns');
    }
}
