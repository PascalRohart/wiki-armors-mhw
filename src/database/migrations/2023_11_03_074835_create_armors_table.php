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
        Schema::create('armors', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('id_type')->nullable();
            $table->unsignedBigInteger('id_rank')->nullable();
            $table->integer('rarity')->nullable();
            $table->integer('defense_base')->nullable();
            $table->integer('defense_max')->nullable();
            $table->unsignedBigInteger('id_resistance')->nullable();
            $table->unsignedBigInteger('id_skill')->nullable();
            $table->unsignedBigInteger('id_armorset')->nullable();
            $table->unsignedBigInteger('id_asset')->nullable();
            $table->integer('slots')->nullable();
            $table->unsignedBigInteger('id_crafting')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('armors');
    }
};
