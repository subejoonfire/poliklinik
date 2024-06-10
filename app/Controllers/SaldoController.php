<?php

namespace App\Controllers;

use App\Models\ModelSaldo;
use App\Models\ModelKeuangan;
use App\Controllers\BaseController;

class SaldoController extends BaseController
{
    public $ModelSaldo;
    public $ModelKeuangan;
    public function __construct()
    {
        $this->ModelSaldo = new ModelSaldo();
        $this->ModelKeuangan = new ModelKeuangan();
    }
    public function tambah()
    {
        $id_keuangan = $this->request->getVar('id_keuangan');
        $tgl_saldo = $this->request->getVar('tgl_saldo');
        $jum_saldo = $this->request->getVar('jum_saldo');

        if (empty($id_keuangan) || empty($tgl_saldo) || empty($jum_saldo)) {
            return redirect()->back()->with('pesan', 'Semua field harus diisi!');
        }

        $data = [
            'id_keuangan' => $id_keuangan,
            'tgl_saldo' => $tgl_saldo,
            'jum_saldo' => $jum_saldo,
        ];

        $this->ModelSaldo->insert($data);

        return redirect()->to(base_url('keuangan/saldo/tampilan'))->with('pesan', 'Data berhasil ditambahkan!');
    }

    public function hapus($id_saldo)
    {
        $this->ModelSaldo->delete($id_saldo);

        return redirect()->back()->with('pesan', 'Data berhasil dihapus!');
    }

    public function edit($id_saldo)
    {
        $id_keuangan = $this->request->getVar('id_keuangan');
        $tgl_saldo = $this->request->getVar('tgl_saldo');
        $jum_saldo = $this->request->getVar('jum_saldo');

        if (empty($id_keuangan) || empty($tgl_saldo) || empty($jum_saldo)) {
            return redirect()->back()->with('pesan', 'Semua field harus diisi!');
        }

        $data = [
            'id_keuangan' => $id_keuangan,
            'tgl_saldo' => $tgl_saldo,
            'jum_saldo' => $jum_saldo,
        ];

        $this->ModelSaldo->update($id_saldo, $data);

        return redirect()->to(base_url('keuangan/saldo/tampilan'))->with('pesan', 'Data berhasil diupdate!');
    }
}
