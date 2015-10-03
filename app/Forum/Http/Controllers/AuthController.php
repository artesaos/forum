<?php

namespace Artesaos\Forum\Http\Controllers;

use Artesaos\Domain\Auth\Contracts\AuthService;
use Artesaos\Domain\Auth\Http\Requests\LoginFormRequest;
use Artesaos\Domain\Users\Contracts\UserRepository;
use Artesaos\Domain\Users\Http\Requests\RegisterFormRequest;
use Artesaos\Domain\Users\User;

/**
 * Class AuthController
 * @package Artesaos\Forum\Http\Controllers
 */
class AuthController extends BaseController
{
    /**
     * @var AuthService
     */
    private $authService;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService, UserRepository $userRepository)
    {
        $this->authService = $authService;
        $this->userRepository = $userRepository;
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
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
        $remember = $request->has('remember');

        if ($this->authService->byCredentials($credentials, $remember)) {
            $this->flash()->success('Bem vindo manolo!');

            return redirect()->guest('/');
        }

        $this->flash()->error('Deu ruim! revise seus dados!');

        return redirect()->back()->withInput($request->only(['email']));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function register()
    {
        return $this->view('auth.register');
    }

    /**
     * @param RegisterFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerUser(RegisterFormRequest $request)
    {
        $user = new User();
        $user->name= $request->get('name');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->username = $request->get('username');

        if ($this->userRepository->save($user)) {
            $this->flash()->info('Logue-se para interagir com o nosso forum.');

            return redirect()->guest('/auth');
        }
    }
}
