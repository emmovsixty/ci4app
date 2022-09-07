<?php

namespace App\Controllers\Users;
use App\Controllers\BaseController;

class Register extends BaseController
{
    public function index()
    {
        return view('user/register');
    }
}

?>