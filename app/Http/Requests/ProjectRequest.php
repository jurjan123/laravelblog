<?php

namespace App\Http\Requests;
use App\Models\User;
use App\Models\Projects;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProjectRequest extends FormRequest
{

    /*
    Determine if the user is authorized to make this request.
     */
    public function authorize():bool
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
            'title' => 'required|min:3',
            'description' => 'required',
            "intro" => "required",
            "image" => "nullable|mimes:jpeg,png,jpg,gif,svg|max:3048",
            "created_at" => "required",
        ];
    }

    public function messages():array
    {
        return [
            'title.required' => 'Titel is verplicht',
            "title.min" => "Titel is korter dan 3 karakters",
            "description.required" => "Beschrijving is verplicht",
            "intro.required" => "Intro is verplicht",
            "image.mimes" => "De afbeelding moet een jpeg,png,jpg,gif of svg zijn",
            "image.max" => "De afbeelding mag niet groter zijn dan 3mb",
        ];
    }
}
