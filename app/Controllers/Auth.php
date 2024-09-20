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
            session()->set('userId', $isPresent['id']);
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

    public function forget_password(){

        if($this->request->getMethod() == "POST"){
            $username = $_POST['github_username'];
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];

            if( $new_password != $confirm_password){
                session()->setFlashdata("error", "Passwords do not match !");
                return redirect()->to('auth/forget_password')->withInput();
            }

            $userModel = new Users();
            $user = $userModel->where("githubUsername", $username)->first();

            if(!$user){
                session()->setFlashdata("error", "User is not available !");
                return redirect()->to('auth/forget_password')->withInput();
            }

            $hash_pass  = password_hash($new_password, PASSWORD_DEFAULT);
            $userModel->update($user['id'], ['password' => $hash_pass]);

            session()->setFlashdata("success", "Password updated successfully!");
            return redirect()->to('auth/index');
        }

        return view('auth/forget_password');
    }
}
