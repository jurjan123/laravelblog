<?php

namespace App\Http\Requests;

use App\Http\Controllers\PostController;
use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\Gate;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;



class PostRequest extends FormRequest
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

        return [
            'title' => 'required|min:3',
            'description' => 'required',
            "intro" => "required",
            "image" => "nullable|mimes:jpeg,png,jpg,gif,svg|max:3048",
            "created_at" => "required",
            "category_id" => "nullable"
            
        ];

    }

    public function messages():array
    {
        return [
            'title.required' => 'Titel is verplicht',
            "title.min" => "Titel is korter dan 3 karakters",
            "description.required" => "Beschrijving is verplicht",
            "intro.required" => "Intro is verplicht",
            "image.mimes" => "De afbeelding moet een jpeg,png,jpg,gif,svg zijn",
            "image.max" => "De afbeelding mag niet groter zijn dan 3mb",
            "created_at.required" => "Datum is verplicht",
        ];
    }

    /*protected function getRedirectUrl()
    {
       

        return redirect("admin/posts/".  $this->post . "/edit")->with("errormessage", "post niet kunnen maken");
    }*/


}
