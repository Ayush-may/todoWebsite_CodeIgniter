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
        $currentUser = $user->select(['githubUsername', 'id', 'created_at'])->where('githubUsername', $username)->first();

        return view('dashboard/home', ['currentUser' => $currentUser]);
    }

    public function addPrsAlready()
    {
        return view('dashboard/addPrsAlready');
    }

    public function addprs()
    {
        #data = [];
        if ($this->request->getMethod() == "POST") {
        }
        return view('dashboard/addprs');
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
}
