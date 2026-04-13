<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (auth()->user()->role === 1) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required","string", "max:50"],
            "type" => ["required","string", "max:30"],
            "price" => ["required","numeric", "min:0", "max:9999999999999.99"],
            "category" => ["required","string", "max:30"],
            "description" => ["required","string", "max:255"],
            "image" => ["image","mimes:jpeg,png,jpg,gif,webp","max:16000"],
            "quantity" => ["required","integer", "min:0"],
            "brandname" => ["required","string", "max:30"],
        ];
    }
}
