<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
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
            'title' => ['required','min:3',Rule::unique('posts', 'title')
            ->ignore($this->post)],
            'description' => ['min:10'],
        ];
    }

    public function messages()
    {
        return  [
            'title.required' => 'Title should be inseart',
            'title.min' => 'Title must be at least 3 chararacter ',
            'description.min' => 'Description must be at least 3 chararacter ',
        ];
    }
}



