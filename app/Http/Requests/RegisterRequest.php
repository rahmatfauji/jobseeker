<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'birth'=>'required|before:-17 years'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Username harus di isi',
            'email.required'=>'Email harus di isi',
            'password.required'=>'Password harus diisi',
            'birth.required'=>'Tanggal Lahir harus diisi',
            'birth.before'=>'Usia minimal 17 tahun'
        ];
    }
}
