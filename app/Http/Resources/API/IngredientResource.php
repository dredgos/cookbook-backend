<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class IngredientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "ingredient_id" => $this->id,
            "ingredient_name" => $this->ingredient_name,
            "used_in" => $this->recipes->pluck("recipe_name"),
        ];
    }
}
