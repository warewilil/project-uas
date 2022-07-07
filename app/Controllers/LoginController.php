<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class LoginController extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new User();
    }
    public function index()
    {
        return view('pages/home');
    }
    public function store()
    {
        $validate = $this->validate([
            'email' => [
                'rules' => 'required|valid_email',
                'errors'    => [
                    'required'  => '{field} harus diisi',
                    'valid_email'   => '{field} tidak valid'
                ]
            ],
            'password'  => [
                'rules' => 'required',
                'errors'    => [
                    'required'  => '{field} harus diisi'
                ]
            ]
        ]);
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $this->userModel->where('email', $email)->first();

        if (!$validate) {
            return redirect()->back()->withInput();
        } else {
            if ($user) {
                if (password_verify($password, $user->password)) {
                    $params = ['id' => $user->id];
                    session()->set($params);
                    return redirect()->to($this->routeRedirect);
                } else {
                    return redirect()->back()->with('erros', 'password salah');
                }
            } else {
                return redirect()->back()->with('erros', 'Email tidak ditemukan');
            }
        }
    }
}
