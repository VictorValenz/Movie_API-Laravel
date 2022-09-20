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
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->integer('status');
            $table->integer('rating');
              //relacion de favorites_users
              $table->foreignId('id_user')
              ->nullable()
              ->constrained('users')
              ->cascadeOnUpdate()
              ->nullOnDelete();
              //relacion de favorites_movies
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
        Schema::dropIfExists('favorites');
    }
};
