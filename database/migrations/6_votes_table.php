<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id('id_vote');
            $table->unsignedBigInteger('id_election');
            $table->unsignedBigInteger('id_candidate')->nullable(); // Nullable pour les électeurs qui n'ont pas encore voté
            $table->unsignedBigInteger('id_user'); // L'électeur
            $table->timestamps();

            $table->foreign('id_election')->references('id_election')->on('elections')->onDelete('cascade');
            $table->foreign('id_candidate')->references('id_candidate')->on('candidates')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('votes');
    }
};