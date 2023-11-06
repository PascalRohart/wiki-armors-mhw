<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Resistance extends Model
{
    use HasFactory;

    public function armor(): HasOne {
        return $this->hasOne(Armor::class);
    }
}
