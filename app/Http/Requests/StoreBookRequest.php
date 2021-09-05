<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            //'id' => 'exists:books,id',
            'name' => 'max:60|min:2',
            'author' => 'max:60|min:2',
            'isbnNo' => 'max:15',
            'image' => 'max:999|image',
        ];
    }
}
