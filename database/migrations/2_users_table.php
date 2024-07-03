<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('firstname', 50);
            $table->string('lastname', 50);
            $table->string('pseudonym', 255)->nullable();
            $table->string('password');
            $table->string('email', 150)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('address', 200);
            $table->string('zipcode', 5);
            $table->string('town', 255);
            $table->string('picture')->nullable();
            $table->date('birthday');
            $table->unsignedBigInteger('id_class')->nullable();
            $table->unsignedBigInteger('id_role')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_class')->references('id_class')->on('classrooms')->onDelete('set null');
            $table->foreign('id_role')->references('id_role')->on('roles')->onDelete('set null');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();

            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
