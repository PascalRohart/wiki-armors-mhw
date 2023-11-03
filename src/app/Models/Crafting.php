<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Crafting extends Model
{
    use HasFactory;

    //$table->foreign('id_materials_list_to_craft')->references('id')->on('materials_lists_to_craft');

    public function materials_list_to_craft(): BelongsTo {
        return $this->belongsTo(MaterialsListToCraft::class);
    }
}
