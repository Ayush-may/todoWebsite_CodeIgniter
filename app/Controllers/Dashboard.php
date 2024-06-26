<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\BaseController;
use App\Models\Repo;
use App\Models\Users;
use App\Helpers\DashBoard_helper;


class Dashboard extends BaseController
{
    protected $dashHelper;
    function __construct()
    {
        $this->dashHelper = new DashBoard_helper();
    }

    public function home()
    {
        $currentUser = $this->dashHelper->already_home(new Users(), session()->get('user'));
        return view('dashboard/home', ['currentUser' => $currentUser]);
    }

    public function addPrsAlready()
    {
        // $user_data = $this->dashHelper->already_user_data(new Users());
        $repo_data = $this->dashHelper->alreadyPrs_repo_data(new Repo());
        return view('dashboard/addPrsAlready', ['data' => $repo_data]);
    }

    public function addprs()
    {
        $repo_name = $this->dashHelper->add_pr_repo_name(new Repo());
        if ($this->request->getMethod() == "POST") {
            $validate = $this->validate([
                'repoName' => 'required',
                'repoNameNew' => 'required',
                'repoLink' => 'required',
                'issueNumber' => 'required',
                'priority' => 'required',
                'assignId' => 'required'
            ]);

            if (!$validate) {
                session()->setFlashdata('validate_error', 'All fields is compulsory !');
                return view('dashboard/addprs', ['repo_name' => $repo_name]);
            }



            session()->setFlashdata('validate_success', 'Successfully saved !');
        }
        return view('dashboard/addprs', ['repo_name' => $repo_name]);
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
