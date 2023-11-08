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
        Schema::create('items_quantities_mappings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_materials_list_to_craft')->nullable();
            $table->integer('quantity_item')->nullable();
            $table->unsignedBigInteger('id_item')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_items');
    }
};
