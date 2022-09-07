<?php

namespace App\Controllers\Book;

use App\Controllers\BaseController;
use App\Models\BookModels;
use CodeIgniter\Validation\StrictRules\Rules;
use Config\Services;

class Book extends BaseController
{
    protected $bookModel;
    public function __construct()
    {
        $this->bookModel = new BookModels();
    }


    public function index()
    {
        $data = [
            'title' => 'Daftar Buku',
            'buku' => $this->bookModel->getBook()
        ];
        return view('book/book', $data);
    }

    public function detail($slug)
    {
        $alt = $this->bookModel->getBook($slug);
        $data = [
            'title' => 'Detail Buku',
            'detail' => $this->bookModel->getBook($slug),
            'alt' => 'ini gambar ' . $alt['slug']
        ];
        return view('/book/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'form tambah data',
            'validation' => \Config\Services::validation()
        ];
        return view('/book/create', $data);
    }

    public function save()
    {
        // jika tidak valid
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah tersedia'
                ]
            ],
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'sampul' => [
                'rules' => 'is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png,image/JPG,image/JPEG,image/PNG]',
                'errors' => [
                    'is_image' => '{field} bukan gambar',
                    'mime_in' => '{field} bukan gambar'
                ]
            ]
        ])) {
            // ambil pesan validasi
            // $validation = \Config\Services::Validation();
            // dd($validation);
            return redirect()->to('/book/create')->withInput();
        }
        // ambil gambar
        $file = $this->request->getFile('sampul');
        //jika user tidak input file gambar
        if ($file->getError() == 4) {
            $file_name = 'default.png';
        } else {
            // ambil random name file
            $file_name = $file->getRandomName();
            // upload ke folder img
            $file->move('img', $file_name);
        }

        // buat slug
        $judul = $this->request->getVar('judul');
        $slug = url_title($judul, '-', true);
        // insert ke database
        $this->bookModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $file_name
        ]);
        session()->setFlashdata('pesan', 'Tambah data berhasil');
        return redirect()->to('/book');
    }

    public function delete($id)
    {
        // cari nama file 
        $get_file = $this->bookModel->find($id);
        // jika nama file selain defaul maka di hapus
        if ($get_file['sampul'] != 'default.png') {
            // hapus file dari folder img
            unlink('img/' . $get_file['sampul']);
        }
        $this->bookModel->delete($id);
        session()->setFlashdata('pesan', 'berhasil menghapus data');
        return redirect()->to('/book');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Edit Buku',
            'validation' => \Config\Services::validation(),
            'buku' => $this->bookModel->getBook($slug)
        ];

        return view('/book/edit', $data);
    }

    public function update($id)
    {
        $oldData = $this->bookModel->getBook($this->request->getVar('slug'));
        if ($oldData['judul'] == $this->request->getVar('judul')) {
            $validate = 'required';
        } else {
            $validate = 'required|is_unique[tb_ci4.judul]';
        }
        if (!$this->validate([
            'judul' => [
                'rules' => $validate,
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah tersedia'
                ]
            ],
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'sampul' => [
                'rules' => 'mime_in[sampul,image/jpg,image/jpeg,image/png,image/JPG,image/JPEG,image/PNG]|is_image[sampul]',
                'errors' => [
                    'mime_in' => '{field} bukan gambar',
                    'is_sampul' => '{field} bukan gambar',
                ]
            ]

        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/book/edit/' . $this->request->getVar('slug'))->withInput();
        };
        // get file sampul
        $file = $this->request->getFile('sampul');
        // jika user tidak memilih/update sampul
        if ($file->getError() == 4) {
            $sampul = $this->request->getVar('old_sampul');
        } else {
            // jika user update sampul
            // ubah nama file menjadi random
            $sampul = $file->getRandomName();
            // upload ke folder img
            $file->move('img', $sampul);
            // hapus file lama
            unlink('img/' . $this->request->getVar('old_sampul'));
        }
        // update ke database
        $this->bookModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'slug' => url_title($this->request->getVar('judul'), '-', true),
            'sampul' => $sampul
        ]);
        session()->getFlashdata('pesan', 'data berhasil di ubah');
        return redirect()->to('/book');
    }
}
