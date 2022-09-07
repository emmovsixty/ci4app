<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Vsixty'
        ];
        return view('user/home', $data);
    }
}
