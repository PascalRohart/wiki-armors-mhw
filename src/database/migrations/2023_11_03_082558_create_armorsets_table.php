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
        Schema::create('armorsets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_rank')->nullable();
            $table->string('name')->nullable();
            //$table->unsignedBigInteger('id_armorset_pieces')->nullable();
            $table->integer('bonus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('armorsets');
    }
};
