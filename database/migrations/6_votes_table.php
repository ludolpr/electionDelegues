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
        Schema::create('votes', function (Blueprint $table) {
            $table->id('id_vote');
            $table->unsignedBigInteger('id_election');
            $table->unsignedBigInteger('id_candidate');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            $table->foreign('id_election')->references('id_election')->on('elections')->onDelete('cascade');
            $table->foreign('id_candidate')->references('id_candidate')->on('candidates')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
};
