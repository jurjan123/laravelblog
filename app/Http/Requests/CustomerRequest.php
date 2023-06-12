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
            'first_name' => ['required', "string", "max:255"],
            'last_name' => ['required', "string", "max:255"],
            "street" => ["required", "max:50"],
            "house_number" => ["required", "max_digits:5"],
            "postal_code" => ["required", "max:10"],
            "city" => ["required", "string", "max:100"],
            'phone_number' => ['required', "dutch-phone-number"],
            'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::user()->id),],
        ];
    }

    public function messages()
    {
        return [
            "first_name.required" => "Voornaam is verplicht",
            "first_name.string" => "Voornaam mag alleen karakters bevatten",
            "last_name.required" => "Achternaam is verplicht",
            "last_name.string" => "Achternaam mag alleen karakters bevatten",
            "street.required" => "Straat is verplicht",
            "house_number.required" => "Huisnummer is verplicht",
            "postal_code.required" => "Postcode is verplicht",
            "postal_code.max" => "Postcode mag niet meer dan 10 cijfers bevatten",
            "city.required" => "Plaats is verplicht",
            "city.string" => "Plaats mag alleen karakters bevatten",
            "phone_number.required" => "Telefoonnummer is verplicht",
            "phone_number.dutch-phone-number" => "Telefoonnummer moet een Nederlands telefoonnummer zijn",
            "email.required" => "Email is verplicht",
            "email.unique" => "Email is al in gebruik"
        ];
    }
}
