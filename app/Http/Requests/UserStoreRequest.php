<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest {

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules() {
        return [
            'name'     => 'required|string|max:255',
            'password' => 'required|string|min:6|max:255',
            'email'    => 'required|unique:users|email|max:255',
        ];
    }
}
