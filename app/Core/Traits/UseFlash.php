<?php

namespace Artesaos\Core\Traits;

trait UseFlash
{
    /**
     * @return \Laracasts\Flash\FlashNotifier
     */
    public function flash()
    {
        return flash();
    }
}