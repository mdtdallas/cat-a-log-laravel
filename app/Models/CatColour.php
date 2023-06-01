<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CatColour extends Model
{
    use HasFactory;

    public function colours(): HasMany
    {
        return $this->hasMany(CatColour::class);
    }

    protected $fillable = [
        'colour_name',
    ];
}
