<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{    
    public function up(): void
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('playlist_id');
            $table->string('title', 150)->nullable();
            $table->string('url', 255)->nullable();
            $table->string('author', 150);
            $table->timestamps();
            $table->foreign('playlist_id')->references('id')->on('playlist');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
