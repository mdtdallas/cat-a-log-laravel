<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatShow extends Model
{
    use HasFactory;

    public function assignedJudges()
    {
        return $this->belongsToMany(Judge::class, 'assigned_judges', 'show_id', 'judge_id');
    }
}
