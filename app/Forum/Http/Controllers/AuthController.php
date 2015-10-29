<?php

namespace Artesaos\Forum\Http\Controllers;

use Socialize;
use Artesaos\Domain\Auth\AuthenticateUser;
use Artesaos\Domain\Auth\AuthenticateUserListener;
use Illuminate\Http\Request;
use Artesaos\Domain\Auth\Contracts\AuthService;
use Artesaos\Domain\Auth\Http\Requests\LoginFormRequest;
use Artesaos\Domain\Users\Contracts\UserRepository;
use Artesaos\Domain\Users\Http\Requests\RegisterFormRequest;

/**
 * Class AuthController.
 */
class AuthController extends BaseController implements AuthenticateUserListener{
    /**
     * @var AuthService
     */
    private $authService;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @param AuthService    $authService
     * @param UserRepository $userRepository
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

        return redirect('/');
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
        $this->seo()->setTitle('Cadastre-se');

        return $this->view('auth.register');
    }

    /**
     * @param RegisterFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerUser(RegisterFormRequest $request)
    {
        $user = $this->userRepository->create($request->all());

        if ($user->exists) {
            $this->flash()->info('Logue-se para interagir com o nosso forum.');

            return redirect('/auth');
        }

        $this->flash()->error('Falha no cadastro');

        return redirect()->back();
    }


    public function getGithub(AuthenticateUser $authenticateUser, Request $request){
        $hasCode = $request->has('code');
        $hasErro = $request->has('error');

        if($hasErro){
            return redirect()->route('home');
        }

        return $authenticateUser->github($hasCode, $this);
    }

    public function getFacebook(AuthenticateUser $authenticateUser, Request $request){
        $hasCode = $request->has('code');
        $hasErro = $request->has('error');
        
        if($hasErro){
            return redirect()->route('home');
        }

        return $authenticateUser->facebook($hasCode, $this);
    }

    public function getGoogle(AuthenticateUser $authenticateUser, Request $request){
        $hasCode = $request->has('code');
        $hasErro = $request->has('error');
        
        if($hasErro){
            return redirect()->route('home');
        }

        return $authenticateUser->google($hasCode, $this);
    }

    public function getTwitter(AuthenticateUser $authenticateUser, Request $request){

        $hasCode = $request->has('oauth_token');
        $hasErro = $request->has('error');
        
        if($hasErro){
            return redirect()->route('home');
        }
       
        return $authenticateUser->twitter($hasCode, $this);
    }

    public function userHasLoggedIn($user) {
        $this->flash()->success('Bem vindo manolo!');
        return redirect()->guest('/');
    }

}
