<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => ["required", "min:3"],
            "image" => "nullable|mimes:jpeg,png,jpg,gif,svg|max:3048",
            "tag" => "nullable|min:5|max:30" 
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Categorynaam is verplicht",
            "name.min" => "Naam moet meer dan 3 karakters bevatten",
            "image.mimes" => "De afbeelding moet een jpeg,png,jpg,gif of svg zijn",
            "image.max" => "Image mag niet groter zijn dan 3mb",
            "tag.min" => "Korte beschrijving moet ten minste 5 karakters bevatten",
            "tag.max" => "Korte beschrijving mag niet langer dan 30 karakters zijn"
        ];
    }
}