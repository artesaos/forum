<?php

namespace App\Panel\Http\Controllers;

use App\Core\Http\Controllers\Controller;

abstract class BaseController extends Controller
{
    /**
     * @param string $view
     * @param array  $data
     * @param array  $mergeData
     *
     * @return \Illuminate\View\View
     */
    protected function view($view = null, $data = [], $mergeData = [])
    {
        return parent::view($view, $data, $mergeData);
    }
}