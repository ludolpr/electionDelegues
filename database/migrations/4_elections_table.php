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
        Schema::create('elections', function (Blueprint $table) {
            $table->id('id_election');
            $table->string('name_election', 255);
            $table->text('description')->nullable();
            $table->integer('number_voters');
            $table->integer('number_votes');
            $table->unsignedBigInteger('id_class');
            $table->timestamps();

            $table->foreign('id_class')->references('id_class')->on('classrooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elections');
    }
};
