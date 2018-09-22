<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class UpdateUserRequest extends FormRequest
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
          'documento' => 'required|unique:users,documento,'.$this->uid,
          'name' => 'required',
          'email' => 'required|unique:users,email,'.$this->uid,
          'password' => 'required',
          'pessoa_fisica' => 'required'
        ];
    }
}
