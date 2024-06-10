<?php

namespace App\Controllers;

use App\Models\ModelKeuangan;
use App\Controllers\BaseController;

class KeuanganViewController extends BaseController
{
    public $ModelKeuangan;
    public function __construct()
    {
        $this->ModelKeuangan = new ModelKeuangan();
    }
    public function index()
    {
        $data = [
            'title' => 'Kelola Keuangan',
            'keuangan' => $this->ModelKeuangan->findAll(),
        ];
        return view('keuangan/keuangan/index', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Keuangan',
        ];
        return view('keuangan/keuangan/tambah', $data);
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Keuangan',
            'data' => $this->ModelKeuangan->find($id),
        ];
        return view('keuangan/keuangan/edit', $data);
    }
}
