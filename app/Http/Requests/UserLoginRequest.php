<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest {

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules() {
        return [
            'email'    => 'required|email|max:255',
            'password' => 'required|max:255',
        ];
    }
}
