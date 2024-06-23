<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Users;

class Auth extends BaseController
{

    public function index()
    {
        if ($this->request->getMethod() == "POST") {
            $validate = $this->validate([
                'githubUsername' => 'required',
                'password' => 'required|min_length[4]|max_length[8]',
            ]);
            if (!$validate) {
                return view('auth/login', ['validation' => $this->validator->getErrors()]);
            }

            $githubUsername = $this->request->getVar('githubUsername');
            $password = $this->request->getVar('password');
            $data = ['githubUsername' => $githubUsername, 'password' => $password];

            $users = new Users();
            $isPresent = $users->where('githubUsername  ', $githubUsername)->first();

            if (!$isPresent) {
                return redirect()->to('auth')->with('error', 'users is not avaialable');
            }

            if (!password_verify($data['password'], $isPresent['password'])) {
                return redirect()->to('auth')->with('error', 'Wrong Password !');
            }

            session()->set('user', $data['githubUsername']);
            session()->set('isLoggedIn', true);
            return redirect()->to('dashboard/home');
        }
        return view('auth/login');
    }

    public function signup()
    {
        if ($this->request->getMethod() == "POST") {
            $validate = $this->validate([
                // 'username' => 'required|min_length[4]|max_length[8]|is_unique[users.username]',
                'githubUsername' => 'required|is_unique[users.githubUsername]',
                'password' => 'required|min_length[4]|max_length[8]',
                'confirmPassword' => 'required|matches[password]',
            ]);
            if (!$validate) {
                session()->setFlashdata('validation', $this->validator->getErrors());
                return redirect()->to('auth/signup');
            }

            $githubUsername = $this->request->getVar('githubUsername');
            $password = $this->request->getVar('password');
            $data = ['githubUsername' => $githubUsername, 'password' => $password];

            $users = new Users();
            if ($users->save($data)) {
                return redirect()->to('/auth/signup')->with('success', 'user is successfully created !');
            }
        }

        return view('auth/signup');
    }
}
