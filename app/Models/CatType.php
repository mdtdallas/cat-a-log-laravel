<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CatType extends Model
{
    use HasFactory;

    public function types(): HasMany
    {
        return $this->hasMany(CatType::class);
    }

    protected $fillable = [
        'type_name',
    ];
}
