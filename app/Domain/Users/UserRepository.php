<?php

namespace Artesaos\Domain\Users;

use Artesaos\Domain\Users\Contracts\UserRepository as UserRepositoryContract;
use Artesaos\Core\Repositories\CommonRepository;

class UserRepository extends CommonRepository implements UserRepositoryContract
{
    protected $modelClass = User::class;
}
