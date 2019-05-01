<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:255',
            'author' => 'required|min:3|max:255',
            'isbn' => 'required|min:10|max:13',
            'page_number' => 'required|numeric|min:1|max:10000',
            'language' => 'required|min:3|max:255',
            'list_id' => 'required|numeric'
        ];
    }
}
