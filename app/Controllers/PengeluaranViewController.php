<?php

namespace App\Controllers;

use App\Models\ModelKeuangan;
use App\Models\JenisObatModel;
use App\Models\ModelPengeluaran;
use App\Controllers\BaseController;

class PengeluaranViewController extends BaseController
{
    public $ModelPengeluaran;
public $ModelKeuangan;
public $ModelJenisObat;

public function __construct()
{
    $this->ModelPengeluaran = new ModelPengeluaran();
    $this->ModelJenisObat = new JenisObatModel();
    $this->ModelKeuangan = new ModelKeuangan();
}

public function index()
{
    $pengeluaran = $this->ModelPengeluaran->join('keuangan', 'pengeluaran.id_keuangan = keuangan.id_keuangan')
        ->join('jenis_obat', 'pengeluaran.id_obat = jenis_obat.id_obat')
        ->findAll();
    $data = [
        'title' => 'Data Pengeluaran',
        'pengeluaran' => $pengeluaran,
    ];
    return view('keuangan/pengeluaran/index', $data);
}

public function tambah()
{
    $data = [
        'title' => 'Tambah Pengeluaran',
        'jenisobat' => $this->ModelJenisObat->findAll(),
        'keuangan' => $this->ModelKeuangan->findAll(),
    ];
    return view('keuangan/pengeluaran/tambah', $data);
}

public function edit($id)
{
    $data = [
        'title' => 'Edit Pengeluaran',
        'data' => $this->ModelPengeluaran->find($id),
        'keuangan' => $this->ModelKeuangan->findAll(),
        'jenisobat' => $this->ModelJenisObat->findAll(),
    ];
    return view('keuangan/pengeluaran/edit', $data);
}
}
