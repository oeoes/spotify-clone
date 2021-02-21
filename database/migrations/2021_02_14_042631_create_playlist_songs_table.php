<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaylistSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlist_songs', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->uuid('playlist_id');
            $table->uuid('song_id');
            $table->timestamps();

            $table->foreign('playlist_id')->references('id')->on('playlists')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playlist_songs');
    }
}
