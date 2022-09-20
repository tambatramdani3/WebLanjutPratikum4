<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Mahasiswa;

class MahasiswaController extends BaseController
{
    protected $mahasiswaModel;
    public function __construct()
    {
        $this->mahasiswaModel = new Mahasiswa();
    }
    public function index()
    {
        $mahasiswa = $this->mahasiswaModel->findAll();

        $data = [
            'title' => 'Mahasiswa',
            'mahasiswa' => $mahasiswa,
        ];

        return view('templates/header', $data)
            . view('mahasiswa/list', $data)
            . view('templates/footer');
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data'
        ];
        return view('templates/header', $data)
            . view('mahasiswa/create')
            . view('templates/footer');
    }
    public function store()
    {
        if (!$this->validate([
            'npm' => 'required',
            'nama' => 'required',
            'alamat' => 'required'
        ])) {
            return redirect()->to('/create')->withInput();
        }
        $data = [
            'npm' => $this->request->getPost('npm'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
        ];
        $this->mahasiswaModel->save($data);
        return redirect()->to('/mahasiswa');
    }
    public function edit($id)
    {
        $mahasiswa = $this->mahasiswaModel->where('id', $id)->first();
        $data = [
            'title' => 'Edit Data',
            'mahasiswa' => $mahasiswa
        ];
        return view('templates/header', $data)
            . view('mahasiswa/edit', $data)
            . view('templates/footer');
    }

    public function update($id)
    {
        if (!$this->validate([
            'npm' => 'required',
            'nama' => 'required',
            'alamat' => 'required'
        ])) {
            return redirect()->to('/edit/' . $id)->withInput();
        }
        $this->mahasiswaModel->save([
            'id' => $id,
            'npm' => $this->request->getVar('npm'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
        ]);
        return redirect()->to('/mahasiswa');
    }
    public function delete($id)
    {
        $this->mahasiswaModel->delete($id);
        return redirect()->to('/mahasiswa');
    }
}

