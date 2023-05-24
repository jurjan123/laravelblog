<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            "description" => "required|min:3|max:2000",
            "created_at" => "required",
            "is_open" => ["required", "boolean"],
            "status_id" => "required",
            "user_id" => "required"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Rolnaam is verplicht",
            "name.min" => "Rolnaam moet meer dan 3 karakters bevatten",
            "created_at.required" => "Datum is verplicht",
            "is_open.required" => "Actief is verplicht",
            "is_open.boolean" => "Kies een status",
            "description.required" => "Beschrijving is verplicht",
            "description.min" => "Beschrijving moet minimaal 3 karakters bevatten",
            "description.max" => "Beschrijving mag niet meer dan 2000 karakters bevatten",
            "status_id.required" => "Status is verplicht",
            "user_id.required" => "Gebruiker is verplicht"
        ];
    }
        
    }

