<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShowResults extends Model
{
    use HasFactory;

    public function results(): HasMany
    {
        return $this->hasMany(ShowResults::class);
    }

    protected $fillable = [
        'cat_id',
        'show_id',
        'placement',
        'score',
    ];
}
