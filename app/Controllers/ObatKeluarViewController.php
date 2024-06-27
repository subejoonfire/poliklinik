<?php

namespace App\Controllers;

use App\Models\JenisObatModel;
use App\Models\ModelObatKeluar;
use App\Controllers\BaseController;

class ObatKeluarViewController extends BaseController
{
    
    public $ModelObatKeluar;
    public $ModelJenisObat;

    public function __construct()
    {
        $this->ModelObatKeluar = new ModelObatKeluar();
        $this->ModelJenisObat = new JenisObatModel();
    }

    public function index()
    {
        $obat_keluar = $this->ModelObatKeluar->join('jenis_obat', 'obat_keluar.id_obat = jenis_obat.id_obat')
            ->findAll();
        $data = [
            'title' => 'Data Obat Keluar',
            'obat_keluar' => $obat_keluar,
        ];
        return view('obat/obat-keluar/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Pengeluaran',
            'jenisobat' => $this->ModelJenisObat->findAll(),
        ];
        return view('obat/obat-keluar/tambah', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Pengeluaran',
            'data' => $this->ModelObatKeluar->find($id),
            'jenisobat' => $this->ModelJenisObat->findAll(),
        ];
        return view('obat/obat-keluar/edit', $data);
    }
}
