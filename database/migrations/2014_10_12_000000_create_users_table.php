<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('state_id')->unsigned();
            $table->bigInteger('local_government_id')->unsigned();
            $table->bigInteger('sponsor_user_id')->unsigned();
            $table->string('username')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('status')->default(true);
            $table->rememberToken();

            //foreign keyss
            // $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            // $table->foreign('local_government_id')->references('id')->on('local_governments')->onDelete('cascade');


            $table->timestamps();

            $table->index('local_government_id');
            $table->index('sponsor_user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
