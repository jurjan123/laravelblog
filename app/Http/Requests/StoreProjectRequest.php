<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => 'required|min:3|max:55|',
        ];
    }

    public function messages(): array
    {
        return [

            'title.required' => 'De naam is verplicht',
            'title.min' => 'De naam moet minimaal :min letters bevatten',
            'title.max' => 'De naam mag niet meer dan :max karakters bevatten',
            
        ];
    }


}
