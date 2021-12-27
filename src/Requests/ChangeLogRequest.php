<?php

namespace Azuriom\Plugin\Zchangelog\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeLogRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:195', 'min:3'],
            'author' => ['required', 'max:195', 'min:3'],
            'description' => ['sometimes', 'nullable', 'max:5000'],
            'changelog' => ['required', 'array'],
        ];
    }

}
