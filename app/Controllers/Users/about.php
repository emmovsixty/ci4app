<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;

class About extends BaseController
{
    public function about()
    {
        $data = [
            'title' => 'About | Vsixty',
            'alamat' => [
                [
                    'Desa' => 'Muncang',
                    'Kecamatan' => 'Bodeh',
                    'Kabupaten' => 'Pemalang'
                ],
                [
                    'Desa' => 'Bodeh',
                    'Kecamatan' => 'Bodeh',
                    'Kabupaten' => 'Pemalang'
                ],
                [
                    'Desa' => 'Kelang depok',
                    'Kecamatan' => 'Bodeh',
                    'Kabupaten' => 'Pemalang'
                ]

            ]
        ];
        return view('user/about', $data);
    }
}
