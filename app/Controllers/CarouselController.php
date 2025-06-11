<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CpuserModel;

class CarouselController extends BaseController
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
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

    // OTP Login
    public function login_otp()
    {
        return view('carousel/request_otp');
    }

    public function sendOtp()
    {
        $email = $this->request->getPost('email');
        $user = $this->userModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak terdaftar');
        }

        $otpCode = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

        $this->session->set([
            'otp_code' => $otpCode,
            'otp_email' => $email,
            'otp_expiry' => time() + 300
        ]);

        $email = \Config\Services::email();
        $email->setFrom('notification@csa-tower.co.id', 'CSA Notification');
        $email->setTo($user['email']);
        $email->setSubject('OTP Login - CSA Carousel');
        $email->setMessage("Your OTP Code is: <b>$otpCode</b><br>This code will expire in 5 minutes.");

        if (!$email->send()) {
            return redirect()->back()->with('error', 'OTP tidak terkirim!');
        }

        return redirect()->to('carousel/otp/verify')->with('message', 'Kode OTP telah dikirim ke email Anda');
    }

    public function verifyOtpForm()
    {
        if (!$this->session->get('otp_email')) {
            return redirect()->to('/carousel/otp')->with('error', 'Silakan request OTP terlebih dahulu');
        }

        return view('carousel/verify_otp');
    }

    public function verifyOtp()
    {
        $userOtp = $this->request->getPost('otp_code');
        $storedOtp = $this->session->get('otp_code');
        $otpExpiry = $this->session->get('otp_expiry');
        $email = $this->session->get('otp_email');

        if (time() > $otpExpiry) {
            return redirect()->back()->with('error', 'Kode OTP telah kadaluarsa');
        }

        if ($userOtp !== $storedOtp) {
            return redirect()->back()->with('error', 'Kode OTP tidak valid');
        }

        $user = $this->userModel->where('email', $email)->first();

        $this->session->set([
            'isLoggedIn' => true,
            'userData' => [
                'userId'    => $user['id'],
                'username'  => $user['username'],
                'email'     => $user['email'],
                'role'      => $user['role'],
                'isLoggedIn' => true,
                'login_time' => time()
            ]
        ]);
        $this->session->remove(['otp_code', 'otp_email', 'otp_expiry']);

        return redirect()->to('carousel/dashboard')->with('message', 'Login berhasil');
    }


    // Extended Function
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
