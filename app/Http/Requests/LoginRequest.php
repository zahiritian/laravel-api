<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class LoginRequest extends FormRequest
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
            'email'     => 'required',
            'password'  => 'required'
        ];
    }

    /**
     * Failed validations.
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @return \Illuminate\Http\Response
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));

    }

    /**
     * Get the messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required'    => 'Email is required.',
            'password.required' => 'Password is required.'
        ];
    }
}
