<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\UserModel;


class User extends BaseController
{
    protected $usermodel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function register()
    {
        $password = $this->request->getVar('password');
        $confirm_password = $this->request->getVar('confirm_password');
        if ($password == $confirm_password) {
            $pw = $this->request->getVar('');
        }
        $this->usermodel->save([
            'username' => $this->request->getVar('username'),
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email')
        ]);
    }
}
