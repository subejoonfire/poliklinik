<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJenisObat;

class JenisObatViewController extends BaseController
{
    public $ModelJenisObat;
    public function __construct()
    {
        $this->ModelJenisObat = new ModelJenisObat();
    }
    public function index()
    {
        $jenisobat = $this->ModelJenisObat->findAll();
        $data = [
            'title' => 'Jenis Obat',
            'jenisobat' => $jenisobat,
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
            'data' => $this->ModelJenisObat->find($id),
        ];
        return view('obat/jenis-obat/edit', $data);
    }
}
