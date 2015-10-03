<?php

namespace Artesaos\Domain\Users\Http\Requests;

use Artesaos\Core\Http\Requests\Request as RequestsBase;

class RegisterFormRequest extends RequestsBase
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'    => 'required',
            'username' => 'required',
            'email'    => 'required|email',
            'password' => 'required',
            'confirmation_password' => 'required|same:password',
        ];
    }
}
