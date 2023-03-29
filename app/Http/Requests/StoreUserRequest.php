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
            "email" => ["max:100", "email", Rule::unique(User::class)->ignore(Auth::user()->id)],
            'user_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "is_admin" => "required",
            "password" => ["required", Password::defaults()],
            "password_confirmation" => 'required_with:password|same:password' 
        ];
    }

    public function messages(){
        return [
            "name.required" => "naam is verplicht",
            "name.string" => "naam moeten letters zijn",
            "name.max" => "naam mag niet langer dan 20 karakters zijn",
            "email.required" => "email is verplicht",
            "email.string" => "email moeten letters zijn",
            "email.unique" => "email is al in gebruik",
            "email.max" => "email mag niet langer dan 100 karakters zijn",
            "rol.required" => "rol is verplicht",
            "password.required" => "vul nieuwe wachtwoord in",
            "password_confirmation.required" => "herhaal nieuwe wachtwoord",
            "password_confirmation.same:new_password" => "het herhaalde wachtoord komt niet overeen met nieuwe wachtwoord",
        ];
    }
}
