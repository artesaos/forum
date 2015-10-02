<?php

namespace Artesaos\Forum\Http\Controllers;

use Artesaos\Domain\Users\UserRepository;
use Artesaos\Domain\Users\Http\Requests\RegisterFormRequest;
use Artesaos\Domain\Users\User;

class RegisterController extends BaseController
{
    /**
     * @var AuthService
     */
    private $userRepository;

    /**
     * @param AuthService $authService
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(){
      return $this->view('pages.register');
    }

    public function registerUser(RegisterFormRequest $request){
       $data = $request->only(['name','email','password']);
       $user = new User();
       $user->fill($data);

       if($this->userRepository->save($user)){
         $this->flash()->info('Logue-se para interagir com o nosso forum.');

         return redirect()->guest('/auth');
       }
    }

}
