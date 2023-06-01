<?php

namespace App\View\Components;

use App\Models\CatGender;
use App\Models\CatRank;
use App\Models\CatColour;
use App\Models\CatBreed;
use App\Models\CatType;
use Illuminate\View\Component;
use App\Models\Cat;

class CatForm extends Component
{
    public $genders;
    public $ranks;
    public $colours;
    public $breeds;
    public $types;
    public $cat;

    public function __construct($cat = null)
    {
        $this->genders = CatGender::all();
        $this->ranks = CatRank::all();
        $this->colours = CatColour::distinct('colour_name')->orderBy('colour_name')->get(['colour_name']);
        $this->breeds = CatBreed::all();
        $this->types = CatType::all();
        $this->cat = $cat;
    }

    public function render()
    {
        
        return view('components.cat-form');
    }

    
}
