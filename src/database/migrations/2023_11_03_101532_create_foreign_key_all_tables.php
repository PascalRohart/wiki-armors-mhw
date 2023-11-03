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
        Schema::table('armors', function (Blueprint $table) {
            $table->foreign('id_type')->references('id')->on('types');
            $table->foreign('id_rank')->references('id')->on('ranks');
            $table->foreign('id_resistance')->references('id')->on('resistances');
            $table->foreign('id_skill')->references('id')->on('skills');
            $table->foreign('id_armorset')->references('id')->on('armorsets');
            $table->foreign('id_crafting')->references('id')->on('craftings');
        });

        Schema::table('armorsets', function (Blueprint $table) {
            $table->foreign('id_rank')->references('id')->on('ranks');
            $table->foreign('id_armorset_pieces')->references('id')->on('armorset_pieces');
        });

        Schema::table('craftings', function (Blueprint $table) {
            $table->foreign('id_materials_list_to_craft')->references('id')->on('materials_lists_to_craft');
        });

        Schema::table('materials_lists_to_craft', function (Blueprint $table) {
            $table->foreign('id_item')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foreign_key_all_tables');
    }
};
