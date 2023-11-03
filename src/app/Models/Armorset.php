<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Armorset extends Model
{
    use HasFactory;

    /*public function rank(): BelongsTo {
        return $this->belongsTo(Rank::class);
    }

    public function armorsetPieces(): BelongsToMany {
        return $this->belongsToMany(ArmorsetPiece::class);
    }*/
}
