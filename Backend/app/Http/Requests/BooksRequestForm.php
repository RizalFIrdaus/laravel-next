<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BooksRequestForm extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required",
            "description" => "required",
            "price" => "required|numeric"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Nama buku harus diisi.",
            "description.required" => "Deskripsi buku harus diisi.",
            "price.required" => "Harga buku harus diisi.",
            "price.numeric" => "Harga buku harus berupa angka.",
        ];
    }
}
