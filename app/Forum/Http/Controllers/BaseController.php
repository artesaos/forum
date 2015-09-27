<?php

namespace Artesaos\Forum\Http\Controllers;

use Artesaos\Core\Http\Controllers\Controller;

abstract class BaseController extends Controller
{
    protected $view_namespace = 'forum::';
}