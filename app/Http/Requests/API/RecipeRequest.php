<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class RecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "recipe_name" => ['required', 'string'],
            "difficulty" => ['required'],
            "time" => ['required', 'integer'],
            "category" => ['required'],
            "method" => ['required', 'string'],
            "ingredients" => ['required', 'array'],
            "ingredients.*" => ['string'],
            "amounts" => ['required', 'array'],
            "amounts.*" => ['string']
        ];
    }
}
