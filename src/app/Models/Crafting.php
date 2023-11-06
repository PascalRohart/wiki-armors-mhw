<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use SebastianBergmann\CliParser\AmbiguousOptionException;

class Crafting extends Model
{
    use HasFactory;

    public function materials_list_to_craft(): BelongsTo {
        return $this->belongsTo(MaterialsListToCraft::class);
    }

    public function armor(): HasOne {
        return $this->hasOne(Armor::class);
    }
}
