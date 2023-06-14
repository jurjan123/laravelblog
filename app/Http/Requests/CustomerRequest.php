<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'first_name' => ['required', "string", "max:40", 'regex:/^[0-9a-zA-Z_\-]*$/'],
            'last_name' => ['required', "string", "max:50", 'regex:/^[0-9a-zA-Z_\-]*$/'],
            "street" => ["required", "max:50", 'regex:/^[0-9a-zA-Z_\-]*$/'],
            "house_number" => ["required", "max_digits:5"],
            "postal_code" => ["required", 'regex:/^[0-9]{4}\s?[a-zA-Z]{2}$/',],
            "city" => ["required", "string", "max:10", 'regex:/^[0-9a-zA-Z_\-]*$/'],
            'phone_number' => ['required', "dutch-phone-number"],
            'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::user()->id),],
        ];
    }

    public function messages()
    {
        return [
            "first_name.required" => "Voornaam is verplicht",
            "first_name.string" => "Voornaam mag alleen karakters bevatten",
            "first_name.regex" => "Karakters zoals /^[0-9a-zA-Z_\-]*$/ niet toegstaan ",
            "first_name.max" => "Voornaam mag niet meer dan 40 karakters bevatten",
            "last_name.required" => "Achternaam is verplicht",
            "last_name.string" => "Achternaam mag alleen karakters bevatten",
            "last_name.regex" => "Karakters zoals /^[0-9a-zA-Z_\-]*$/ niet toegstaan ",
            "last_name.max" => "Achternaam mag niet meer dan 50 karakters bevatten",
            "street.required" => "Straat is verplicht",
            "house_number.required" => "Huisnummer is verplicht",
            "house_number.max_digits" => "Huisnummer mag niet meer dan 5 cijfers bevatten",
            "postal_code.required" => "Postcode is verplicht",
            "postal_code.max" => "Postcode mag niet meer dan 10 tekens bevatten",
            "postal_code.regex" => "Voer een geldige postcode in",
            "city.required" => "Plaats is verplicht",
            "city.string" => "Plaats mag alleen karakters bevatten",
            "city.max" => "Plaats mag niet meer dan 20 karakters bevatten",
            "city.regex" => "Karakters zoals /^[0-9a-zA-Z_\-]*$/ niet toegstaan ",
            "phone_number.required" => "Telefoonnummer is verplicht",
            "phone_number.dutch-phone-number" => "Telefoonnummer moet een Nederlands telefoonnummer zijn",
            "email.required" => "Email is verplicht",
            "email.unique" => "Email is al in gebruik",
            "email.email" => "Email moet een geldig email adres zijn"
            
        ];
    }
}
