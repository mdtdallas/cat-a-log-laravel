<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShowSponsor extends Model
{
    use HasFactory;

    public function sponsors(): HasMany
    {
        return $this->hasMany(ShowSponsor::class);
    }

    protected $fillable = [
        'sponsor_name',
        'sponsor_img',
        'sponsor_url',
    ];
}
