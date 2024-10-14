<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:150',
            'type_id' => 'nullable'
        ];
    }

    public function message() {
        return [
            'name.required' => 'Questo campo è obbligatorio',
            'name.max' => 'Deve contenere :max caratteri'
        ];
    }
}
