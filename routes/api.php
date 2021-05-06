<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RecipeController;
use App\Http\Controllers\API\IngredientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(["prefix" => "recipes"], function() {
    Route::get("", [RecipeController::class, "index"]);
    Route::post("", [RecipeController::class, "store"]);

    Route::group(["prefix" => "{recipe}"], function() {
        Route::get("", [RecipeController::class, "show"]);
    });

});

Route::group(["prefix" => "ingredients"], function() {
    Route::get("", [IngredientController::class, "index"]);
    Route::post("", [IngredientController::class, "store"]);
});