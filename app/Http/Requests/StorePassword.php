<?php

namespace App\Http\Requests;

use App\Rules\MatchOldPassword;
use Illuminate\Foundation\Http\FormRequest;

class StorePassword extends FormRequest
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
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => 'required',
            'new_confirm_password' => ['required','same:new_password'],
        ];
    }
    public function attributes()
    {
        return [
            'current_password' => 'contraseña actual',
            'new_password' => 'contraseña nueva',
            'new_confirm_password' => 'confirmar contraseña nueva'

        ];
    }

    public function messages()
    {
        return[
            'current_password.required' => 'El campo Contraseña Actual es requerido.',
            'new_password.required' => 'El campo Contraseña Nueva es requerido.',
            'new_confirm_password.required' => 'El campo Confirmar Contraseña Nueva es requerido.',
            'new_confirm_password.same' => 'La Contraseña Nueva y Confirmar Contraseña Nueva deben ser iguales.',
        ];
    }
}
