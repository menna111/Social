<?php

namespace App\Http\Requests\Backend\categories;

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
            'meta_keywords' => ['string','max:191'],
            'meta_descriptions' => ['string','max:191'],

        ];
    }
}
