<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('streaming_movie', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('status');
              //relacion de streaming_movies
              $table->foreignId('id_streaming')
              ->nullable()
              ->constrained('streaming')
              ->cascadeOnUpdate()
              ->nullOnDelete();
              //relacion de streaming_movies
              $table->foreignId('id_movie')
              ->nullable()
              ->constrained('movies')
              ->cascadeOnUpdate()
              ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('streaming_movie');
    }
};
