<?php

namespace Artesaos\Forum\Http\Controllers;

use Artesaos\Domain\Auth\Contracts\AuthService;
use Artesaos\Domain\Auth\Http\Requests\LoginFormRequest;

class AuthController extends BaseController
{
    /**
     * @var AuthService
     */
    private $authService;

    /**
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->seo()->setTitle('Identifique-se');

        return $this->view('auth.index');
    }

    public function logout(){
          $this->authService->logout();
          $this->flash()->success('Deslogado, volte sempre!');
          return redirect()->guest('/');
    }

    /**
     * @param LoginFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginFormRequest $request)
    {
        // @TODO Error and Success messages

        $credentials = $request->only(['password', 'email']);
        $remember    = $request->has('remember');

        if ($this->authService->byCredentials($credentials, $remember)) {
            $this->flash()->success('Bem vindo manolo!');

            return redirect()->guest('/');
        }

        $this->flash()->error('Deu ruim! revisa seus dados!');

        return redirect()->back()->withInput($request->only(['email']));
    }
}
