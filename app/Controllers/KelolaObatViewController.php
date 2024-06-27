<?php

namespace App\Controllers;

use App\Models\KandunganModel;
use App\Models\ObatModel;
use App\Controllers\BaseController;

class KelolaObatViewController extends BaseController
{
    public $ObatModel, $KandunganModel;

    public function __construct()
    {
        $this->ObatModel = new ObatModel();
        $this->KandunganModel = new KandunganModel();
    }

    public function index()
    {
        $obat = $this->ObatModel->join('kandungan', 'obat.idkandungan = kandungan.idkandungan')->findAll();
        $data = [
            'title' => 'Data Obat',
            'obat' => $obat,
        ];
        return view('obat/kelola-obat/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Obat',
            'kandunganobat' => $this->KandunganModel->findAll(),
        ];
        return view('obat/kelola-obat/tambah', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Obat',
            'obat' => $this->ObatModel->find($id),
            'kandungan' => $this->KandunganModel->findAll(),
        ];
        return view('obat/kelola-obat/edit', $data);
    }
}
