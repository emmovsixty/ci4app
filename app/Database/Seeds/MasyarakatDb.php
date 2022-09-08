<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class MasyarakatDb extends Seeder
{
    public function run()
    {
        $data = [
            'nama' => 'jidni',
            'alamat'    => 'palembang',
            'umur'    => '19',
            'created_at' => Time::now(),
            'updated_at' => Time::now()
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO masyarakatDb (nama, alamat, umur, created_at, updated_at) VALUES(:nama:, :alamat:, :umur:, :created_at:, :updated_at:)', $data);

        // Using Query Builders
        $this->db->table('masyarakatDb')->insert($data);
    }
}
