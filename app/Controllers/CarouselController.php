<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CpuserModel;

class CarouselController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new CpuserModel();
    }

    public function index()
    {
        $this->checkSessionExpiry();

        if (session()->get('isLoggedIn')) {
            return view('carousel/dashboard');
        }

        return view('carousel/login');
    }

    public function login()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('username', $username)
            ->orWhere('email', $username)
            ->first();

        if (!$user) {
            return redirect()->back()->withInput()->with('error', 'Username atau password salah');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Username atau password salah');
        }

        if (!$user['active']) {
            return redirect()->back()->withInput()->with('error', 'Akun Anda tidak aktif');
        }

        $sessionData = [
            'userId'    => $user['id'],
            'username'  => $user['username'],
            'email'     => $user['email'],
            'role'      => $user['role'],
            'isLoggedIn' => true,
            'login_time' => time()
        ];

        session()->set($sessionData);

        return redirect()->to('/carousel');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/carousel/login');
    }

    public function checkSessionExpiry()
    {
        if (session()->has('isLoggedIn')) {
            $loginTime = session()->get('login_time');
            $currentTime = time();
            $expiryTime = 12 * 60 * 60;

            if (($currentTime - $loginTime) > $expiryTime) {
                session()->destroy();
                return redirect()->to('/login')->with('message', 'Session telah kadaluarsa');
            }
        }
    }
}
