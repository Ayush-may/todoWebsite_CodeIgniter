<?php

namespace App\Controllers;

class Home extends BaseController
{
    /**
     * for '/' routes
     */
    public function index()
    {
        return redirect()->to('auth');
    }
}
