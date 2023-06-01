<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CatGender extends Model
{
    use HasFactory;

    public function genders(): HasMany
    {
        return $this->hasMany(CatGender::class);
    }

    protected $fillable = [
        'gander_name',
    ];
}
