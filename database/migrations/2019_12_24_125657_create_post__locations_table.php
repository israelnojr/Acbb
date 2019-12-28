<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post__locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('post_id')->unsigned();
            $table->bigInteger('state_id')->unsigned();
            $table->bigInteger('local_government_id')->unsigned();
            $table->bigInteger('town_id')->unsigned();
            $table->boolean('status')->default(true);

            //foreign keyss
            // $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            // $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            // $table->foreign('local_government_id')->references('id')->on('local_governments')->onDelete('cascade');
            // $table->foreign('town_id')->references('id')->on('towns')->onDelete('cascade');

            $table->timestamps();

            $table->index('post_id');
            $table->index('state_id');
            $table->index('local_government_id');
            $table->index('town_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post__locations');
    }
}
