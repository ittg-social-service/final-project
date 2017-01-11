<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
class UpdateStudentRequest extends FormRequest
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
        $user = User::find($this->users);

        return [
            'name' => 'required',
            'first_lastname' => 'required',
            'second_lastname' => 'required',
            'phone' => 'required',
            'email' => "required",
          ];

    }
    public function messages()
    {
        return [
            'name.required' => 'Olvidaste escribir tu nombre.',
            'first_lastname.required'  => 'Olvidaste escribir tu apellido paterno.',
            'second_lastname.required'  => 'Olvidaste escribir tu apellido materno.',
            'phone.required'  => 'Olvidaste escribir tu numero de telefono.',
            'email.unique' => 'El email ya esta en uso.',
            'email.required' => 'Olvidaste escribir tu email.'
        ];
    }


}
