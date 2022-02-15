<?php

namespace App\Http\Requests\Backend\pages;

use Illuminate\Foundation\Http\FormRequest;

class store extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required','string', 'max:255','min:10'],
            'meta_keywords' => ['string', 'max:191'],
            'meta_description' => ['string', 'max:191'],

        ];
    }
}
