<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesPollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies_polls', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->unsignedBigInteger('submitted_by');

            $table->unsignedBigInteger('movie_id');
            $table->uuid('poll_uuid');

            $table->boolean('voting_eligible')->default(true);

            $table->timestamps();

            $table->foreign('submitted_by')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('movie_id')->references('id')->on('movies')->cascadeOnDelete();
            $table->foreign('poll_uuid')->references('uuid')->on('polls')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies_polls');
    }
}
