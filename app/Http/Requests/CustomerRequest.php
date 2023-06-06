<?php

namespace App\Http\Requests;

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
            'first_name' => ['required'],
            'last_name' => ['required'],
            "street" => ["required"],
            "house_number" => "required",
            "postal_code" => "required",
            "city" => "required",
            'phone_number' => ['required', 'min:7'],
            'email' => ['required', 'email'],
        ];
    }

    public function messages()
    {
        return [
            "first_name.required" => "Voornaam is verplicht",
            "last_name.required" => "Achternaam is verplicht",
            "street.required" => "Straat is verplicht",
            "house_number.required" => "Huisnummer is verplicht",
            "postal_code.required" => "Postcode is verplicht",
            "city.required" => "Plaats is verplicht",
            "phone_number.required" => "Telefoonnummer is verplicht",
            "email.required" => "Email is verplicht",
        ];
    }
}
