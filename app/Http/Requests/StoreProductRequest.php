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
            'product_title'       => 'required|string|max:255',
            'product_category'    => 'required|string|max:255',
            'product_description' => 'required|string',
            'product_quantity'    => 'required|integer|min:1',
            'product_price'       => 'required|numeric|min:1',
            'product_image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'product_title.required' => 'A title is required',
            'product_description.required' => 'A message is required',
            'product_quantity.min' => 'minimum quantity 1',
            'product_price.min' => 'minimum price $1',
        ];
    }
}
