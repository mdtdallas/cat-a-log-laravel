<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CatBreed extends Model
{
    use HasFactory;

    public function breeds(): HasMany
    {
        return $this->hasMany(CatBreed::class);
    }

    protected $fillable = [
        'breed_name',
    ];
}
