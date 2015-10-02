<?php

namespace Artesaos\Domain\Auth\Http\Requests;

use Artesaos\Core\Http\Requests\Request as RequestsBase;

class LoginFormRequest extends RequestsBase
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required',
        ];
    }
}
