<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetailuserRequest extends FormRequest
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
            'email' => 'required|string|email|max:255',
            'address' => 'required|string|max:100',
            'city' => 'required|string|max:50',            
            'birth'=>'required|before:-17 years',
            'gender' => 'required',
            'mobilephone' => 'required|regex:/[0-9]/|max:15',
            'educational' => 'required|string|max:100',
            'filecv' => 'mimes:pdf|max:1000',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'name.required'=>'Username harus di isi',
    //         'email.required'=>'Email harus di isi',
    //         'password.required'=>'Password harus diisi',
    //         'birth.required'=>'Tanggal Lahir harus diisi',
    //         'birth.before'=>'Usia minimal 17 tahun'
    //     ];
    // }
}
