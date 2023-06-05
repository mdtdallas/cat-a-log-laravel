<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\ShowJudges;

class CatShow extends Model
{
    use HasFactory;

    public function assignedJudges()
    {
        return $this->belongsToMany(ShowJudges::class, 'assigned_judges', 'show_id', 'judge_id');
    }

    public function assignedCats()
    {
        return $this->belongsToMany(Cat::class, 'assigned_cats', 'show_id', 'cat_id');
    }

    public function showResults()
    {
        return $this->hasMany(ShowResults::class);
    }

    public function getAssignedJudgesWithShowId($showId)
    {
        return $this->assignedJudges()->wherePivot('show_id', $showId)->get();
    }

    public function shows(): HasMany
    {
        return $this->hasMany(CatShow::class);
    }

    protected $fillable = [
        'show_name',
        'show_date',
        'show_entry_close',
        'show_img',
        'show_location',
        'show_rules',
        'show_covid_plan',
        'show_description',
    ];
}
