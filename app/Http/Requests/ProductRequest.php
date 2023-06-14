<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;



class ProductRequest extends FormRequest
{
    
    
    /*
    Determine if the user is authorized to make this request.
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
        //$price = array('regex:/^[0-9]{1,3}(,[0-9]{3})*\.[0-9]+$/');

        return [
            'name' => 'required|min:3|max:100',
            'description' => 'required|min:3|max:5000',
            "image" => "nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:3048",
            "categories" => "nullable",
            "price" => ['required', "numeric", ],
            "stock" => "nullable|integer|digits_between:0,6", 
            "vat" => "required|integer",
            "discount" => "nullable|lt:price|numeric"
        ];

    }

    public function messages():array
    {
        return [
            'name.required' => 'Titel is verplicht',
            "name.min" => "Titel is korter dan 3 karakters",
            "name.max" => "Titel is langer dan 100 karakters",
            "description.required" => "Beschrijving is verplicht",
            "description.min" => "Beschrijving moet minimaal 3 karakters bevatten",
            "description.max" => "Beschrijving mag niet meer dan 5000 karakters bevatten",
            "image.mimes" => "De afbeelding moet een jpeg,png,jpg,gif,svg zijn",
            "image.max" => "De afbeelding mag niet groter zijn dan 3mb",
            "price.required" => "Prijs is verplicht",
            "price.numeric" => "Prijs mag geen letters bevatten",
            "stock.required" => "Kwantiteit is verplicht",
            "stock.digits_between" => "Voorraad moet tussen 1 en 1 miljoen zijn",
            "vat.required" => "BTW is verplicht",
            "vat.integer" => "BTW moet een getal zijn",
            "vat.min" => "BTW moet minimaal 1 procent zijn",
            "vat.max" => "BTW mag niet meer van 100 procent zijn",
            "quantity.integer" => "Kwantiteit mag niet meer dan 15 cijfers zijn",
            "quantity.digits_between" => "Kwantiteit mag niet meer dan 7 cijfers zijn",
            "discount.lt" => "Korting mag niet duurder of gelijk zijn aan de aanbiedingsprijs"
           
        ];
    }
}
