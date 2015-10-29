<?php

namespace Artesaos\Forum\Http\Controllers;

use Artesaos\Core\Http\Controllers\Controller;
use Artesaos\Core\Traits\UseFlash;
use Artesaos\SEOTools\Traits\SEOTools as UseSEOTools;

abstract class BaseController extends Controller
{
    use UseSEOTools, UseFlash;

    protected $view_namespace = 'forum::';
}
