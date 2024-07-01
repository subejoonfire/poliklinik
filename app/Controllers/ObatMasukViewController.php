<?php

namespace App\Controllers;

use App\Models\ObatModel;
use App\Models\StokModel;
use App\Models\RiwayatModel;
use App\Models\ModelKeuangan;
use App\Models\KandunganModel;
use App\Controllers\BaseController;

class ObatMasukViewController extends BaseController
{
    public $ModelKeuangan;
    public $StokModel;
    public $KandunganModel;
    public $ObatModel;
    public $RiwayatModel;
    public function __construct()
    {
        $this->StokModel = new StokModel();
        $this->KandunganModel = new KandunganModel();
        $this->ModelKeuangan = new ModelKeuangan();
        $this->RiwayatModel = new RiwayatModel();
        $this->ObatModel = new ObatModel();
    }
    public function index()
    {
        $obat = $this->RiwayatModel->join('obat', 'riwayat.kode_obat = obat.kode_obat')->join('kandungan', 'obat.idkandungan = kandungan.idkandungan')
            ->join('stok', 'riwayat.idstok = stok.idstok')->where('keterangan = "Masuk"')->findAll();
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
            'namaobat' => $this->ObatModel->findAll(),
        ];
        return view('obat/obat-masuk/tambah', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Pemasukan',
            'data' => $this->RiwayatModel->where('idriwayat',$id)->join('obat', 'riwayat.kode_obat = obat.kode_obat')->first(),
            'obat' => $this->ObatModel->findAll(),
        ];
        return view('obat/obat-masuk/edit', $data);
    }
}
