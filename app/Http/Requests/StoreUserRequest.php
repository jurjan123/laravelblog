<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            "name" => ["required", "string", "max:20"],
            "email" => ["required", "max:100", "email"],
            'user_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "role" => "required",
            "is_admin" => "required",
            "password" => ["required", "confirmed"],
            "password_confirmation" => 'required|required_with:password|same:password' 
        ];
    }

    public function messages(){
        return [
            "name.required" => "Naam is verplicht",
            "name.string" => "Naam moeten letters zijn",
            "name.max" => "Naam mag niet langer dan 20 karakters zijn",
            "email.required" => "Email is verplicht",
            "email.string" => "Email moeten letters zijn",
            "email.unique" => "Email is al in gebruik",
            "email.max" => "Email mag niet langer dan 100 karakters zijn",
            "user_image.mimes" => "De afbeelding moet een jpeg,png,jpg,gif of svg zijn",
            "user_image.max" => "De afbeelding mag niet groter zijn dan 2mb",
            "role.required" => "Rol is verplicht",
            "password.required" => "Vul nieuwe wachtwoord in",
            "password_confirmation.required" => "Herhaal nieuwe wachtwoord",
           
            "password.confirmed" => "het herhaalde wachtoord komt niet overeen met het nieuwe wachtwoord",
        ];
    }
}
