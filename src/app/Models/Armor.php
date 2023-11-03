<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Armor extends Model
{
    use HasFactory;

    /*public function type(): BelongsTo {
        return $this->belongsTo(Type::class);
    }

    public function rank(): BelongsTo {
        return $this->belongsTo(Rank::class);
    }

    public function resistance(): BelongsTo {
        return $this->belongsTo(Resistance::class);
    }

    public function skill(): BelongsTo {
        return $this->belongsTo(Skill::class);
    }

    public function armorset(): BelongsTo {
        return $this->belongsTo(Armorset::class);
    }

    public function crafting(): BelongsTo {
        return $this->belongsTo(Crafting::class);
    }*/
}
