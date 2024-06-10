<?php

namespace App\Controllers;

use App\Models\JenisObatModel;
use App\Controllers\BaseController;

class JenisObat extends BaseController
{

    protected $jenisObatModel;

    public function __construct()
    {
        $this->jenisObatModel = new JenisObatModel();
    }

    // function untuk menampilkan data jenis obat 
    public function index()
    {
        $data['title'] = 'Kelola Jenis Obat';
        $data['jenis_obat'] = $this->jenisObatModel->findAll();

        return view('jenis_obat/index', $data);
    }

    // function untuk menampilkan form tambah data jenis obat
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Jenis Obat',
            'validation' => \Config\Services::validation()

        ];

        return view('jenis_obat/tambah', $data);

    }

    public function simpan()
    {

        // jika data sudah ada maka akan menampilkan pesan error
        if ($this->jenisObatModel->where(['jenis_obat' => $this->request->getVar('jenis_obat')])->first()) {
            session()->setFlashdata('errors', ['jenis_obat' => 'Jenis Obat Sudah Ada']);
            return redirect()->back()->withInput();
        } else {
            session()->remove('errors');
        }

        // validasi inputan
        $validationRules = [
            'jenis_obat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Jenis Obat Harus Diisi',
                ],
            ]
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->jenisObatModel->save([
            'jenis_obat' => $this->request->getVar('jenis_obat')
        ]);

        session()->setFlashdata('pesan', 'Data Jenis Obat Berhasil Ditambahkan');
        return redirect()->to('/jenis-obat');
    }

    // function untuk menampilkan form edit data jenis obat
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Jenis Obat',
            'validation' => \Config\Services::validation(),
            'jenis_obat' => $this->jenisObatModel->find($id)
        ];

        return view('jenis_obat/edit', $data);
    }
    // function untuk mengupdate data jenis obat
    public function update($id)
    {
        $validationRules = [
            'jenis_obat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Jenis Obat Harus Diisi',
                ],
            ]
        ];
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        } else {
            session()->remove('errors');
        }
        $jenis_obat = $this->request->getVar('jenis_obat');
        $data = [
            'jenis_obat' => $jenis_obat
        ];
        $this->jenisObatModel->update($id, $data);
        session()->setFlashdata('pesan', 'Data Jenis Obat Berhasil Diubah');
        return redirect()->to('/jenis-obat');
    }

    // function untuk menghapus data jenis obat
    public function hapus($id)
    {
        $this->jenisObatModel->delete($id);
        session()->setFlashdata('pesan', 'Data Jenis Obat Berhasil Dihapus');
        return redirect()->to('/jenis-obat');
    }
}