<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('post_category_id')->unsigned();
            $table->Integer('view_count');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image');
            $table->text('content');
            $table->boolean('status')->default(false);

            //foreign keyss
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('post_category_id')->references('id')->on('local_governments')->onDelete('cascade');

            $table->timestamps();

            $table->index('user_id');
            $table->index('post_category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
