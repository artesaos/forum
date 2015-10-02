<?php

namespace Artesaos\Forum\Http\Controllers;

use Artesaos\Domain\Auth\Contracts\AuthService;
use Illuminate\Http\Request;

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

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // @TODO Error and Success messages

        $credentials = $request->only(['password', 'email']);
        $remember    = $request->has('remember');

        if ($this->authService->byCredentials($credentials, $remember)) {
            return redirect()->guest('/');
        }

        return redirect()->withInput($request->only(['email']))->back();
    }
}