<?php

namespace Artesaos\Domain\Users;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter
{
    /**
     * @param int $size
     *
     * @return string
     */
    public function avatar($size = 100)
    {
        $hash = md5($this->entity->email);

        return "//www.gravatar.com/avatar/{$hash}?d=identicon&s={$size}";
    }
}