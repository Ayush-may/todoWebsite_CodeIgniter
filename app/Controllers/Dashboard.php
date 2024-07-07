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
        // No use for now 
        // $repo_name = $this->dashHelper->add_pr_repo_name(new Repo());

        if ($this->request->getMethod() == "POST") {
            $validate = $this->validate([
                // 'repoName' => 'required',
                'repoNameNew' => 'required',
                'repoLink' => 'required',
                // 'issueNumber' => 'required',
                // 'priority' => 'required',
                // 'assignId' => 'required'
            ]);

            if (!$validate) {
                session()->setFlashdata('validate_error', 'All fields is compulsory !');
                return view('dashboard/addprs');
                // return view('dashboard/addprs', ['repo_name' => $repo_name]);
            }

            $getPost = $this->request->getPost();
            $data = [
                'user_id' => 2,
                'repo_name' => $getPost['repoNameNew'],
                'repo_link' => $getPost['repoLink'],
            ];

            $repo = new Repo();
            if ($repo->save($data)) {
                session()->setFlashdata('validate_success', 'Successfully saved !');
            }
        }
        // return view('dashboard/addprs', ['repo_name' => $repo_name]);
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

    public function repo_details($repo_id)
    {
        $repo = new Repo();
        $data = $repo->select('repo.*')
            ->where('repo.user_id', session()->get('userId'))
            ->where('repo.id', $repo_id)
            ->get()
            ->getResult();

        echo '<pre>';
        print_r($data);

        return view('dashboard/repo_details');
    }

    public function remove_repo($id)
    {
        if ($this->request->getMethod() == "POST") {
            if ($this->dashHelper->remove_repo_by_id(new Repo(), $id)) {
                return redirect()->to('dashboard/addPrsAlready');
            }
        }
        return redirect()->to('dashboard/addPrsAlready');
    }
}
