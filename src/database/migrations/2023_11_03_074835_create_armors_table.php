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
            $table->string('type')->nullable();
            $table->string('rank')->nullable();
            $table->integer('rarity')->nullable();
            $table->integer('defense_base')->nullable();
            $table->integer('defense_augmented')->nullable();
            $table->integer('slots')->nullable();

            // TABLE TYPE WITH FK ID_TYPE
            // TABLE RANK WITH FK ID_RANK
            // TABLE RESISTANCES
            // TABLE ATTRIBUTES
            // TABLE SKILLS
            // TABLE ARMORSETS WITH FOREIGN KEY
            // TABLE ASSETS
            // TABLE CRAFTING

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
