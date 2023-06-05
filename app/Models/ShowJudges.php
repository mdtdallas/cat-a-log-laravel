<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShowJudges extends Model
{
    use HasFactory;

    public function assignedShows()
    {
        return $this->belongsToMany(Show::class, 'assigned_judges', 'judge_id', 'show_id');
    }

    public function assignedJudges()
    {
        return $this->belongsToMany(ShowJudges::class, 'assigned_judges', 'show_id', 'judge_id');
    }

    public function judges(): HasMany
    {
        return $this->hasMany(ShowJudges::class);
    }
    // This is what this line does
    protected $fillable = [
        'judge_name',
        'judge_expertise',
        'council_id',
        'show_id'
    ];
}
