<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_galleries', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->uuid('artist_id');
            $table->string('image');
            $table->timestamps();

            $table->foreign('artist_Id')->references('id')->on('artists')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artist_galleries');
    }
}
