<?php
namespace Artesaos\Domain\Auth;

use Artesaos\Domain\Auth\Contracts\AuthService as Auth;
use Artesaos\Domain\Users\UserRepository;
use Laravel\Socialite\Contracts\Factory as Socialite;
use Illuminate\Support\Facades\Session;
class AuthenticateUser
{
    
    /**
     * @var UserRepository
     */
    private $users;
    
    /**
     * @var Socialite
     */
    private $socialite;
    
    /**
     * @var Guard
     */
    private $auth;
    
    /**
     * @param UserRepository $users
     * @param Socialite $socialite
     * @param Guard $auth
     */
    public function __construct(Auth $auth, UserRepository $users, Socialite $socialite) {
        $this->users = $users;
        $this->socialite = $socialite;
        $this->auth = $auth;
    }
    
    /**
     * @param boolean $hasCode
     * @param AuthenticateUserListener $listener
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function facebook($hasCode, AuthenticateUserListener $listener) {
        
        if (!$hasCode) return $this->socialite->driver('facebook')->redirect();
        
        $user = $this->users->findOrCreate($this->socialite->driver('facebook')->user(),'facebook');
        
        $this->auth->login($user, true);

        return $listener->userHasLoggedIn($user);
    }
    
    /**
     * @param boolean $hasCode
     * @param AuthenticateUserListener $listener
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function twitter($hasCode, AuthenticateUserListener $listener) {
        if (!$hasCode) return $this->socialite->driver('twitter')->redirect();
        
        $user = $this->users->findOrCreate($this->socialite->driver('twitter')->user(),'twitter');
        
        $this->auth->login($user, true);
        
        return $listener->userHasLoggedIn($user);
    }
    
    /**
     * @param boolean $hasCode
     * @param AuthenticateUserListener $listener
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function google($hasCode, AuthenticateUserListener $listener) {
        if (!$hasCode) return $this->socialite->driver('google')->redirect();
        
        $user = $this->users->findOrCreate($this->socialite->driver('google')->user(),'google');
        
        $this->auth->login($user, true);
        return $listener->userHasLoggedIn($user);
    }

    /**
     * @param boolean $hasCode
     * @param AuthenticateUserListener $listener
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function github($hasCode, AuthenticateUserListener $listener) {
        if (!$hasCode) return $this->socialite->driver('github')->redirect();
       
        $user = $this->users->findOrCreate($this->socialite->driver('github')->user(),'github');
        $this->auth->login($user, true);
        return $listener->userHasLoggedIn($user);
    }
}
