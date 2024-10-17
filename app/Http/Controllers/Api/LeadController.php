<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request) {
        $form_data = $request->all();

        $validator = Validator::make($form_data, [
            'name' => 'required|max:100',
            'surname' => 'required|max:100',
            'phone' => 'required|max:15',
            'email_address' => 'required|max:100',
            'content' => 'required'
        ],
        $errors = [
            'name.required' => 'Questo campo è obbligatorio',
            'surname.required' => 'Questo campo è obbligatorio',
            'phone.required' => 'Questo campo è obbligatorio',
            'email_address.required' => 'Questo campo è obbligatorio',
            'content.required' => 'Questo campo è obbligatorio',
            'name.max' => 'Non puoi superare i :max caratteri',
            'surname.max' => 'Non puoi superare i :max caratteri',
            'phone.max' => 'Non puoi superare i :max caratteri',
            'email_address.max' => 'Non puoi superare i :max caratteri',
        ]);
    }
}
