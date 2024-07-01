<?php

namespace App\Controllers;

use App\Models\ObatModel;
use App\Models\StokModel;
use App\Models\RiwayatModel;
use App\Models\ModelKeuangan;
use App\Models\KandunganModel;
use App\Controllers\BaseController;

class ObatKeluarViewController extends BaseController
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
        $obat_keluar = $this->RiwayatModel->join('obat', 'riwayat.kode_obat = obat.kode_obat')->join('kandungan', 'obat.idkandungan = kandungan.idkandungan')
            ->join('stok', 'riwayat.idstok = stok.idstok')->where('keterangan = "Keluar"')->findAll();
        $data = [
            'title' => 'Data Obat Keluar',
            'obat' => $obat_keluar,
        ];
        return view('obat/obat-keluar/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Pemasukan',
            'namaobat' => $this->ObatModel->findAll(),
        ];
        return view('obat/obat-keluar/tambah', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Pengeluaran',
            'data' => $this->ObatModel->find($id),
            'jenisobat' => $this->KandunganModel->findAll(),
        ];
        return view('obat/obat-keluar/edit', $data);
    }
}
