<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CatRank extends Model
{
    use HasFactory;

    public function ranks(): HasMany
    {
        return $this->hasMany(CatRank::class);
    }

    protected $fillable = [
        'rank_name',
    ];
}
