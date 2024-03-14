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
        Schema::create('verse_days', function (Blueprint $table) {
            $table->id();
            $table->string('livro');
            $table->string('author');
            $table->string('group');
            $table->string('captulo');
            $table->string('versiculo');
            $table->bigInteger('img');
            $table->string('text');
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
        Schema::dropIfExists('verse_days');
    }
};
