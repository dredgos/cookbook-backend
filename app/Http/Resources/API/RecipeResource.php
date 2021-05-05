<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $name = $this->ingredients->pluck("ingredient_name");
        $quanitity = $this->ingredients->pluck("pivot")->pluck("amount");

        return [
            "recipe_id" => $this->id,
            "recipe_name" => $this->recipe_name,
            "ingredients" => $this->ingredientList($name, $quanitity),
            "method" => $this->method,
            "updated_at" => $this->lastUpdated(),
        ];
    }
}
