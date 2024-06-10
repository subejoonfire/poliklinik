<?php

namespace App\Controllers;

use App\Models\ModelSaldo;
use App\Models\ModelKeuangan;
use App\Controllers\BaseController;

class SaldoViewController extends BaseController
{
    public $ModelSaldo;
    public $ModelKeuangan;
    public function __construct()
    {
        $this->ModelSaldo = new ModelSaldo();
        $this->ModelKeuangan = new ModelKeuangan();
    }
    public function index()
    {
        $data = [
            'title' => 'Kelola Saldo',
            'saldo' => $this->ModelSaldo->join('keuangan', 'keuangan.id_keuangan = saldo.id_keuangan')->findAll(),
        ];
        return view('keuangan/saldo/index', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Saldo',
            'keuangan' => $this->ModelKeuangan->findAll(),
        ];
        return view('keuangan/saldo/tambah', $data);
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Saldo',
            'data' => $this->ModelSaldo->find($id),
            'keuangan' => $this->ModelKeuangan->findAll(),
        ];
        return view('keuangan/saldo/edit', $data);
    }
}
