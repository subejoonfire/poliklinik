<?php

namespace App\Controllers;

use App\Models\StokModel;
use App\Models\ModelKeuangan;
use App\Models\KandunganModel;
use App\Controllers\BaseController;

class ObatMasukViewController extends BaseController
{
    public $ModelKeuangan;
    public $StokModel;
    public $KandunganModel;
    public function __construct()
    {
        $this->StokModel = new StokModel();
        $this->KandunganModel = new KandunganModel();
        $this->ModelKeuangan = new ModelKeuangan();
        $this->StokModel = new StokModel();
    }
    public function index()
    {
        $obat = $this->StokModel->join('obat', 'stok.kode_obat = obat.kode_obat')->join('kandungan', 'obat.idkandungan = kandungan.idkandungan')
            ->findAll();
        $data = [
            'title' => 'Data Obat Masuk',
            'obat' => $obat,
        ];
        return view('obat/obat-masuk/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Pemasukan',
            'namaobat' => $this->StokModel->findAll(),
        ];
        return view('obat/obat-masuk/tambah', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Pemasukan',
            'data' => $this->StokModel->find($id),
            'jenisobat' => $this->KandunganModel->findAll(),
        ];
        return view('obat/obat-masuk/edit', $data);
    }
}
