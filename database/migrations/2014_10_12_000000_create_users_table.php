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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('username')->unique();
            $table->date('data_nascimento');
            $table->string('genero');
            $table->string('cargo')->default('joper');
            $table->string('endereco');
            $table->string('bairro');
            $table->string('numero');
            $table->timestamp('username_verified_at')->nullable();
            $table->string('password');
            $table->string('token_api')->unique()->index();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
