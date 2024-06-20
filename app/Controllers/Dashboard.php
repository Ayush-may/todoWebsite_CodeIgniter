<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function home()
    {
        return view('dashboard/home');
    }

    public function workinprogress()
    {
        return view('dashboard/workinprogress');
    }
    public function completedprs()
    {
        return view('dashboard/completedprs');
    }
    public function wishlistprs()
    {
        return view('dashboard/wishlistprs');
    }

    public function test1()
    {
        return view('dashboard/test1');
    }
}
