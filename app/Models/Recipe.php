<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['img_url', 'recipe_name', 'difficulty', 'time', 'category', 'method'];

    public function ingredients() 
    {
        return $this->belongsToMany(Ingredient::class)->withPivot(['amount']);
    }

    public function lastUpdated()
    {
        return $this->updated_at->diffForHumans();
    }

    public function ingredientList($ingredients, $quantities) 
    {
        $ingredientsList = $ingredients->all();
        $quantitiesList = $quantities->all();
        
        return collect((array_combine($ingredientsList, $quantitiesList)));     
        
    }

}
