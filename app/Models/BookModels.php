<?php

namespace App\Models;

use CodeIgniter\Model;


class BookModels extends Model
{
    protected $table = 'tb_ci4';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['judul', 'penulis', 'penerbit', 'slug', 'sampul'];

    public function getBook($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
