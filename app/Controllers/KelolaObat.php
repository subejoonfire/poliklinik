<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ObatModel;

class KelolaObat extends BaseController
{

    protected $obatModel;
    public function __construct()
    {
        $this->obatModel = new ObatModel();
    }

    public function index()
    {
        $data['title'] = 'Kelola Obat';
        $data['obat'] = $this->obatModel->getObat();
        return view('kelola_obat/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Obat',
            'validation' => \Config\Services::validation(),
            'jenis_obat' => $this->obatModel->getJenisObat(),

        ];
        return view('kelola_obat/tambah', $data);

    }

    public function simpan()
    {
        // validasi inputan
        $validationRules = [
            'id_jenis_obat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Jenis Obat Harus Diisi',
                ],
            ],
            'nama_obat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Nama Obat Harus Diisi',
                ],
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Harga Harus Diisi',
                ],
            ],
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Stok Harus Diisi',
                ],
            ],
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/kelola-obat/tambah')->withInput();
        }

        // jika kode obat sudah ada dan nama obat sudah ada maka akan menampilkan pesan error
        if ($this->obatModel->where(['kode_obat' => $this->request->getVar('kode_obat')])->first() && $this->obatModel->where(['nama_obat' => $this->request->getVar('nama_obat')])->first()) {
            session()->setFlashdata('errors', ['kode_obat' => 'Kode Obat Sudah Ada', 'nama_obat' => 'Nama Obat Sudah Ada']);
            return redirect()->back()->withInput();
        } else {
            session()->remove('errors');
        }

        $this->obatModel->save([
            'id_jenis_obat' => $this->request->getVar('id_jenis_obat'),
            'kode_obat' => $this->request->getVar('kode_obat'),
            'nama_obat' => $this->request->getVar('nama_obat'),
            'harga' => $this->request->getVar('harga'),
            'harga_jual' => $this->request->getVar('harga_jual'),
            'stok' => $this->request->getVar('stok'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/kelola-obat');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Obat',
            'validation' => \Config\Services::validation(),
            'jenis_obat' => $this->obatModel->getJenisObat(),
            'obat' => $this->obatModel->find($id),
        ];

        return view('kelola_obat/edit', $data);
    }

    public function update($id)
    {
        // validasi inputan
        $validationRules = [
            'id_jenis_obat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Jenis Obat Harus Diisi',
                ],
            ],
            'nama_obat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Nama Obat Harus Diisi',
                ],
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Harga Harus Diisi',
                ],
            ],
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Stok Harus Diisi',
                ],
            ],
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/kelola-obat/edit/' . $id)->withInput();
        }

        $id_jenis_obat = $this->request->getVar('id_jenis_obat');
        $kode_obat = $this->request->getVar('kode_obat');
        $nama_obat = $this->request->getVar('nama_obat');
        $harga = $this->request->getVar('harga');
        $harga_jual = $this->request->getVar('harga_jual');
        $stok = $this->request->getVar('stok');

        $data = [
            'id_jenis_obat' => $id_jenis_obat,
            'kode_obat' => $kode_obat,
            'nama_obat' => $nama_obat,
            'harga' => $harga,
            'harga_jual' => $harga_jual,
            'stok' => $stok,
        ];

        $this->obatModel->update($id, $data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('/kelola-obat');
    }

    public function hapus($id)
    {
        $this->obatModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/kelola-obat');
    }


}
