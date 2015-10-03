<?php

namespace Artesaos\Domain\Users;

use Artesaos\Core\Repositories\CommonRepository;
use Artesaos\Domain\Users\Contracts\UserRepository as UserRepositoryContract;

class UserRepository extends CommonRepository implements UserRepositoryContract
{
    protected $modelClass = User::class;

    /**
     * @param array $data
     *
     * @return User
     */
    public function create(array $data = [])
    {
        $user = new User($data);

        if (isset($data['email'])) {
            $user->email = $data['email'];
        }

        if (isset($data['username'])) {
            $user->username = $data['username'];
        }

        if (isset($data['password'])) {
            $user->password = $data['password'];
        }

        $user->save();

        return $user;
    }
}
