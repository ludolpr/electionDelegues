<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id('id_candidate');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_election');
            $table->timestamps();

            // Ajouter les contraintes de clé étrangère
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_election')->references('id_election')->on('elections')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('candidates');
    }
};