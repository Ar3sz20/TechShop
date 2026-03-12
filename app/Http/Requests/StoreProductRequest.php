<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required","string", "max: 50"],
            "type" => ["required","string", "max:30"],
            "price" => ["required","decimal" , "min: 0.99", "max: 9999999999999.99"],
            "category" => ["required","string" , "max:30"],
            "description" => ["required","string", "max:255"],
            "image" => ["required","image","mimes:jpeg,png,jpg,gif,webp","max:16000"],
            "quantity" => ["required","integer", "min: 0"]
        ];
    }
}
