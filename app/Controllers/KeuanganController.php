<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKeuangan;
use App\Models\ModelSaldo;

class KeuanganController extends BaseController
{
    public $ModelKeuangan;
    public $ModelSaldo;
    public function __construct()
    {
        $this->ModelKeuangan = new ModelKeuangan();
        $this->ModelSaldo = new ModelSaldo();
    }
    public function tambah()
    {
        $hari_mulai = $this->request->getVar('hari_mulai');
        $jam_mulai = $this->request->getVar('jam_mulai');
        $hari_berakhir = $this->request->getVar('hari_berakhir');
        $jam_berakhir = $this->request->getVar('jam_berakhir');
        $jenis_poli = $this->request->getVar('jenis_poli');

        if (empty($hari_mulai) || empty($jam_mulai) || empty($hari_berakhir) || empty($jam_berakhir) || empty($jenis_poli)) {
            return redirect()->back()->with('pesan', 'Semua field harus diisi!');
        }

        if (!preg_match("/^([01]\d|2[0-3]):[0-5]\d$/", $jam_mulai) || !preg_match("/^([01]\d|2[0-3]):[0-5]\d$/", $jam_berakhir)) {
            return redirect()->back()->with('pesan', 'Format jam tidak valid!');
        }

        $data = [
            'hari_mulai' => $hari_mulai,
            'jam_mulai' => $jam_mulai,
            'hari_berakhir' => $hari_berakhir,
            'jam_berakhir' => $jam_berakhir,
            'jenis_poli' => $jenis_poli
        ];

        $this->ModelKeuangan->insert($data);

        session()->setFlashdata('pesan', 'Data berhasil disimpan!');
        return redirect()->to(base_url('/keuangan/keuangan/tampilan'));
    }
    public function hapus($id)
    {
        if (empty($id)) {
            return redirect()->back()->with('pesan', 'ID tidak boleh kosong!');
        }

        $this->ModelKeuangan->where('id_keuangan', $id);
        $data = $this->ModelKeuangan->find();

        if (!$data) {
            return redirect()->back()->with('pesan', 'Data tidak ditemukan!');
        }

        $this->ModelKeuangan->delete($id);

        return redirect()->back()->with('pesan', 'Data berhasil dihapus!');
    }
    public function edit($id)
    {
        $data = $this->ModelKeuangan->find($id);

        if (!$data) {
            return redirect()->back()->with('pesan', 'Data tidak ditemukan!');
        }

        $hari_mulai = $this->request->getVar('hari_mulai');
        $jam_mulai = $this->request->getVar('jam_mulai');
        $hari_berakhir = $this->request->getVar('hari_berakhir');
        $jam_berakhir = $this->request->getVar('jam_berakhir');
        $jenis_poli = $this->request->getVar('jenis_poli');

        if (empty($hari_mulai) || empty($jam_mulai) || empty($hari_berakhir) || empty($jam_berakhir) || empty($jenis_poli)) {
            return redirect()->back()->with('pesan', 'Semua field harus diisi!');
        }

        $data_update = [
            'hari_mulai' => $hari_mulai,
            'jam_mulai' => $jam_mulai,
            'hari_berakhir' => $hari_berakhir,
            'jam_berakhir' => $jam_berakhir,
            'jenis_poli' => $jenis_poli,
        ];

        $this->ModelKeuangan->update($id, $data_update);

        session()->setFlashdata('pesan', 'Data berhasil diupdate!');
        return redirect()->to(base_url('/keuangan/keuangan/tampilan'));
    }
}
