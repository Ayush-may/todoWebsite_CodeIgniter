<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Logout extends BaseController
{
    public function index()
    {
        // session()->remove('isLoggedIn');
        session()->destroy();
        return redirect()->to('/auth');
    }
}
