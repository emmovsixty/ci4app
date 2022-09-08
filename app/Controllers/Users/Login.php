<?php

namespace App\Controllers\Users;
use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        return view('user/login');
    }

    public function register()
    {
        $username = $this->request->getVar('username');
    }
}
