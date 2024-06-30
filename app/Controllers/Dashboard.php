<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Repo;
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
        $user = new Users();
        /**
         * Getting the current user's data
         * like Repo , issues 
         */
        $data = $user
            ->select('users.*,issue.*,repo.*')
            ->join('issue', 'users.id = issue.user_id')
            ->join('repo', 'users.id = repo.user_id')
            ->where('users.id', session()->get('userId'))
            ->get()
            ->getResult();

        return view('dashboard/addPrsAlready', ['data' => $data]);
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
