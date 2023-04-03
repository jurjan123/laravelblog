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
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:3048",
            "tag" => "nullable|min:5|max:30" 
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Categorynaam is verplicht",
            "name.min" => "naam moet meer dan 3 karakters bevatten",
            "image.mimes" => "De afbeelding moet een jpeg,png,jpg,gif,svg zijn",
            "image.max" => "image mag niet groter zijn dan 3mb",
            "tag.min" => "tag moet ten minste 5 karakters bevatten",
            "tag.max" => "tag mag niet langer dan 30 karakters zijn"
        ];
    }
}