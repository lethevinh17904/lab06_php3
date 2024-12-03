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
        Schema::create('moives', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('poster', 255)->nullable;
            $table->string('intro', 255);
            $table->dateTime('release_date');
            $table->foreignId('gene_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moives');
    }
};