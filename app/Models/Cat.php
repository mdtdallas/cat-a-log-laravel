<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cat extends Model
{
    use HasFactory;

    protected $table = 'cats';

    protected $fillable = [
        'cat_name',
        'date_of_birth',
        'cat_bio',
    ];

    protected $primaryKey = 'cat_id';
}
