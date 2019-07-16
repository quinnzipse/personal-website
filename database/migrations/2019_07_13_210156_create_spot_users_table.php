<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpotUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spot_users', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('spotUsername')->notNullable();
            $table->string('image_url');
            $table->string('artist');
            $table->string('song');
            $table->string('user_uri');
            $table->string('product');
            $table->string('user_pfp');
            $table->string('song_uri');
            $table->string('artist_uri');
            $table->bigInteger('progress_ms');
            $table->bigInteger('duration');
            $table->boolean('isPlaying');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spot_users');
    }
}
