<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class HomeController extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new User();
    }
    public function index()
    {
        if (session()->id) {
            return redirect()->to($this->routeRedirect);
        }
        return view('welcome_message');
    }
}
