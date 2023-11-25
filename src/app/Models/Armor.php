<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Armor extends Model
{
    use HasFactory;

    public function type(): BelongsTo {
        return $this->belongsTo(Type::class, 'id_type');
    }

    public function rank(): BelongsTo {
        return $this->belongsTo(Rank::class, 'id_rank');
    }

    public function resistance(): HasOne {
        return $this->hasOne(Resistance::class, 'id', 'id_resistance');
    }

    public function skill(): BelongsTo {
        return $this->belongsTo(Skill::class);
    }

    public function armorSet(): BelongsTo {
        return $this->belongsTo(ArmorSet::class);
    }

    public function asset(): HasMany {
        return $this->hasMany(Asset::class);
    }

    public function crafting(): HasOne {
        return $this->hasOne(Crafting::class);
    }
}
