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
                'username' => 'required|min_length[4]|max_length[8]',
                'password' => 'required|min_length[4]|max_length[8]',
            ]);
            if (!$validate) {
                return view('auth/login', ['validation' => $this->validator->getErrors()]);
            }

            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $data = ['username' => $username, 'password' => $password];

            $users = new Users();
            $isPresent = $users->where('username', $username)->first();

            if (!$isPresent) {
                return redirect()->to('auth')->with('error', 'users is not avaialable');
            }

            if (!password_verify($data['password'], $isPresent['password'])) {
                return redirect()->to('auth')->with('error', 'Wrong Password !');
            }

            session()->set('user', $data['username']);
            session()->set('isLoggedIn', true);
            return redirect()->to('dashboard/home');
        }
        return view('auth/login');
    }

    public function signup()
    {
        if ($this->request->getMethod() == "POST") {
            $validate = $this->validate([
                'username' => 'required|min_length[4]|max_length[8]|is_unique[users.username]',
                'password' => 'required|min_length[4]|max_length[8]',
                'confirmPassword' => 'required|matches[password]',
            ]);
            if (!$validate) {
                return view('auth/signup', ['validation' => $this->validator->getErrors()]);
            }

            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $data = ['username' => $username, 'password' => $password];

            $users = new Users();
            if ($users->save($data)) {
                return redirect()->to('/auth/signup')->with('success', 'user is successfully created !');
            }
        }

        return view('auth/signup');
    }
}
