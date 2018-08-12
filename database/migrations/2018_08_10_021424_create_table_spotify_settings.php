<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSpotifySettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spotifySettings', function($table) {
            $table->increments('id');
            $table->string('spotUsername')->notNullable();
            $table->boolean('uadd')->default(false);
            $table->boolean('ulisten')->default(false);
            $table->boolean('padd')->default(false);
            $table->boolean('plisten')->default(false);
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
        Schema::dropIfExists('spotifySettings');
    }
}
