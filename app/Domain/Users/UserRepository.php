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
    public function create(array $data = []) {
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
    
    public function findOrCreate($data, $service) {
        $user = new User;

        // condição especifica pro twitter por não trazer e-mail no auth
        $params = array('email' => $data->email);
        if($service == 'twitter'){
            $params = array('username' => $data->nickname);
        }

        $user = $user->firstOrCreate($params);
        $user->name = $data->name;
        $user->email = $data->email;
        $user->username = $data->nickname;
        $user->save();
  
        return $user;
    }
}
