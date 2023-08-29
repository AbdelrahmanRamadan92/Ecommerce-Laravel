<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //if false and admin is authinticated will return un authorized
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $product = $this->route('product'); // 
        $id = $product->id;

        return [
            'name' => ['required', 'string', 'unique:products,name,' . $id, 'max:50', 'min:3'],
            'filename' => ['nullable', 'image', 'mimes:png,jpg', 'max:2048'],
            'price' => ['required', 'numeric', 'min:1'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }
}
