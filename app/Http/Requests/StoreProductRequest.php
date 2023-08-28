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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'unique:products', 'max:50', 'min:3'],
            'filename' => ['required', 'image', 'mimes:png,jpg', 'max:2048'],
            'price' => ['required', 'numeric', 'min:1'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }
}
