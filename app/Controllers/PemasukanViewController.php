<?php

namespace App\Controllers;

use App\Models\ModelKeuangan;
use App\Models\JenisObatModel;
use App\Models\ModelPemasukan;
use App\Controllers\BaseController;

class PemasukanViewController extends BaseController
{
    public $ModelPemasukan;
    public $ModelKeuangan;
    public $ModelJenisObat;
    public function __construct()
    {
        $this->ModelPemasukan = new ModelPemasukan();
        $this->ModelJenisObat = new JenisObatModel();
        $this->ModelKeuangan = new ModelKeuangan();
    }
    public function index()
    {
        $pemasukan = $this->ModelPemasukan->join('keuangan', 'pemasukan.id_keuangan = keuangan.id_keuangan')
            ->join('jenis_obat', 'pemasukan.id_obat = jenis_obat.id_obat')
            ->findAll();
        $data = [
            'title' => 'Data Pemasukan',
            'pemasukan' => $pemasukan,
        ];
        return view('keuangan/pemasukan/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Pemasukan',
            'jenisobat' => $this->ModelJenisObat->findAll(),
            'keuangan' => $this->ModelKeuangan->findAll(),
        ];
        return view('keuangan/pemasukan/tambah', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Pemasukan',
            'data' => $this->ModelPemasukan->find($id),
            'keuangan' => $this->ModelKeuangan->findAll(),
            'jenisobat' => $this->ModelJenisObat->findAll(),
        ];
        return view('keuangan/pemasukan/edit', $data);
    }
}
