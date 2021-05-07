<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = ['ingredient_name'];

    public function recipes() 
    {
        return $this->belongsToMany(Recipe::class)->withPivot(['amount']);
    }

    public static function fromStrings(array $strings) : Collection
    {
        return collect($strings)->map(fn($str) => trim($str))
                                ->unique()
                                ->map(fn($str) => Ingredient::firstOrCreate(["ingredient_name" => $str]));
    }
}
