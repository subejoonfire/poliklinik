<?php

namespace App\Controllers;

use App\Models\ModelKeuangan;
use App\Models\ObatModel;
use App\Controllers\BaseController;

class ObatMasukController extends BaseController
{
    public $ObatModel;

    public function __construct()
    {
        $this->ObatModel = new ObatModel();
    }
    public function tambah()
    {
        $data = [
            'id_obat' => $this->request->getPost('id_obat'),
            'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
            'jumlah' => $this->request->getPost('jumlah'),
            'status' => $this->request->getPost('status'),
            'nomina_harga' => $this->request->getPost('nomina_harga'),
            'total_harga' => $this->request->getPost('total_harga'),
            'klasifikasi' => $this->request->getPost('klasifikasi'),
        ];
        $this->ObatModel->insert($data);

        return redirect()->to(base_url('obat/obat-masuk/tampilan'))->with('pesan', 'Data berhasil ditambahkan');
    }

    public function hapus($id)
    {
        $this->ObatModel->where('id_obat_masuk',$id)->delete();

        return redirect()->to(base_url('obat/obat-masuk/tampilan'))->with('pesan', 'Data berhasil dihapus');
    }

    public function edit($id)
    {
        $data = [
            'id_obat' => $this->request->getPost('id_obat'),
            'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
            'jumlah' => $this->request->getPost('jumlah'),
            'status' => $this->request->getPost('status'),
            'nomina_harga' => $this->request->getPost('nomina_harga'),
            'total_harga' => $this->request->getPost('total_harga'),
            'klasifikasi' => $this->request->getPost('klasifikasi'),
        ];

        $this->ObatModel->update($id, $data);

        return redirect()->to(base_url('obat/obat-masuk/tampilan'))->with('pesan', 'Data berhasil diedit');
    }
}
