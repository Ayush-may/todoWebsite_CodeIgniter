<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Users;


class Dashboard extends BaseController
{
    public function home()
    {
        $username = session()->get('user');
        $user = new Users();
        $currentUser = $user->select(['username', 'id', 'created_at'])->where('username', $username)->first();

        return view('dashboard/home', ['currentUser' => $currentUser]);
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
