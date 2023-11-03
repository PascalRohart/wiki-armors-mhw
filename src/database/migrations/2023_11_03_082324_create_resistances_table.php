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
        Schema::create('resistances', function (Blueprint $table) {
            $table->id();
            $table->integer('fire')->nullable();
            $table->integer('water')->nullable();
            $table->integer('ice')->nullable();
            $table->integer('thunder')->nullable();
            $table->integer('dragon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resistances');
    }
};
