<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            "name" => ["required", "min:3"]
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "rolnaam is verplicht",
            "name.min" => "naam moet meer dan 3 karakters bevatten"
        ];
    }
}
