<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Http\Resources\API\RecipeResource;
use App\Http\Requests\API\RecipeRequest;
use App\Http\Requests\API\IngredientRequest;
use App\Http\Resources\API\IngredientResource;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RecipeResource::collection(Recipe::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(RecipeRequest $request)
    {
        $recipe = new Recipe;
        $recipe->recipe_name = $request->get("recipe_name");
        $recipe->difficulty = $request->get("difficulty");
        $recipe->time = $request->get("time");
        $recipe->category = $request->get("category");
        $recipe->method = $request->get("method");
        
        $recipe->save();

        $ingredients = $request->get("ingredients");
        $amounts = $request->get("amounts");

        for ($i = 0; $i < count($ingredients); $i += 1){

            $ingredient_id = Ingredient::firstOrCreate(['ingredient_name' => $ingredients[$i]])->id;

            $recipe->ingredients()->attach($ingredient_id, ['amount' => $amounts[$i]]);

        }
        return new RecipeResource($recipe);        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return new RecipeResource($recipe);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        $data = $request->all();
        $recipe->fill($data)->save();
        return new RecipeResource($recipe);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return response(null, 204);
    }
}
