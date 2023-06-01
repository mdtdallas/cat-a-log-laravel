<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CatCouncil extends Model
{
    use HasFactory;
    
    public function councils(): HasMany
    {
        return $this->hasMany(CatCouncil::class);
    }

    protected $fillable = [
        'council_name',
        'council_short_name',
        'council_img',
        'council_address',
        'council_state',
        'council_email',
        'council_phone',
        'council_url',
        'user_id',
    ];
}
