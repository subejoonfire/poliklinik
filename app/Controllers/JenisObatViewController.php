<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KandunganModel;

class JenisObatViewController extends BaseController
{
    public $KandunganModel;
    public function __construct()
    {
        $this->KandunganModel = new KandunganModel();
    }
    public function index()
    {
        $kandungan = $this->KandunganModel->findAll();
        $data = [
            'title' => 'Jenis Obat',
            'kandungan' => $kandungan,
        ];
        return view('obat/jenis-obat/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Pemasukan',
        ];
        return view('obat/jenis-obat/tambah', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Pemasukan',
            'data' => $this->KandunganModel->find($id),
        ];
        return view('obat/jenis-obat/edit', $data);
    }
}
