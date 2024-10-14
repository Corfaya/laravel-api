<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'name' => ['required', Rule::unique('projects')->ignore($this->project), 'max:50'],
            'date_of_upload' => ['required'],
            'type_id' => [Rule::exists('types','id')],
            'description' => ['nullable'],
            'preview' => ['nullable']
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Questo campo è obbligatorio',
            'name.max' => 'Può contenere al massimo :max caratteri',
            'type_id.exists' => 'La categoria selezionata non esiste',
            'date_of_upload.required' => 'Questo campo è obbligatorio',
            'stack.required' => 'Questo campo è obbligatorio'
        ];
    }
}
