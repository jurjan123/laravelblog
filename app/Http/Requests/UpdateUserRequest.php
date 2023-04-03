<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => ['unique:users,email,'.Auth::user()->id, "max:100", "email"],
            'user_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "role" => "required",
            "is_admin" => "required",
            "password" => "required",
            "new_password" => ["required"],
            "password_confirmation" => 'required_with:new_password|same:new_password' 
        ];
    }

    public function messages(){
        return [
            "name.required" => "naam is verplicht",
            "name.string" => "naam moeten letters zijn",
            "name.max" => "naam mag niet langer dan 20 karakters zijn",
            "email.required" => "email is verplicht",
            "email.email" => "email is verplicht",
            "email.string" => "email moeten letters zijn",
            "email.unique" => "email is al in gebruik",
            "email.max" => "email mag niet langer dan 100 karakters zijn",
            "user_image.mimes" => "De afbeelding moet een jpeg,png,jpg,gif,svg zijn",
            "user_image.max" => "De afbeelding mag niet groter zijn dan 3mb",
            "password.required" => "vul oude wachtwoord in",
            "new_password.required" => "vul nieuwe wachtwoord in",
            "password_confirmation.required" => "herhaal nieuwe wachtwoord",
            "password_confirmation.same:new_password" => "het herhaalde wachtoord komt niet overeen met nieuwe wachtwoord",
        ];
    }
}
