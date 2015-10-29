<?php
/**
 * Created by PhpStorm.
 * User: tabutcu
 * Date: 2/28/15
 * Time: 3:24 PM
 */
namespace Artesaos\Domain\Auth;

interface AuthenticateUserListener
{
    public function userHasLoggedIn($user);
}