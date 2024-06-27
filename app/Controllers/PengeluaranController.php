<?php

namespace App\Controllers;

use App\Models\ModelKeuangan;
use App\Models\JenisObatModel;
use App\Models\ModelPengeluaran;
use App\Controllers\BaseController;

class PengeluaranController extends BaseController
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

public function tambah()
{
    $id_keuangan = $this->request->getVar('id_keuangan');
    $tgl_pengeluaran = $this->request->getVar('tgl_pengeluaran');
    $keterangan = $this->request->getVar('keterangan');
    $jum_pengeluaran = $this->request->getVar('jum_pengeluaran');
    if (empty($id_keuangan) || empty($tgl_pengeluaran) || empty($keterangan) || empty($jum_pengeluaran)) {
        return redirect()->back()->with('pesan', 'Semua field harus diisi!');
    }

    $data = [
        'id_keuangan' => $id_keuangan,
        'tgl_pengeluaran' => $tgl_pengeluaran,
        'keterangan' => $keterangan,
        'jum_pengeluaran' => $jum_pengeluaran,
    ];
    $this->ModelPengeluaran->insert($data);

    session()->setFlashdata('pesan', 'Data berhasil disimpan!');
    return redirect()->to(base_url('/keuangan/pengeluaran/tampilan'));
}

public function hapus($id)
{
    if (empty($id)) {
        return redirect()->back()->with('pesan', 'ID tidak boleh kosong!');
    }

    $this->ModelPengeluaran->where('id_pengeluaran', $id);
    $data = $this->ModelPengeluaran->find();

    if (!$data) {
        return redirect()->back()->with('pesan', 'Data tidak ditemukan!');
    }

    $this->ModelPengeluaran->delete($id);

    return redirect()->back()->with('pesan', 'Data berhasil dihapus!');
}

public function edit($id)
{
    $data = $this->ModelPengeluaran->find($id);

    if (!$data) {
        return redirect()->back()->with('pesan', 'Data tidak ditemukan!');
    }

    $id_keuangan = $this->request->getVar('id_keuangan');
    $tgl_pengeluaran = $this->request->getVar('tgl_pengeluaran');
    $keterangan = $this->request->getVar('keterangan');
    $jum_pengeluaran = $this->request->getVar('jum_pengeluaran');

    if (empty($id_keuangan) || empty($tgl_pengeluaran) || empty($keterangan) || empty($jum_pengeluaran)) {
        return redirect()->back()->with('pesan', 'Semua field harus diisi!');
    }

    $data_update = [
        'id_keuangan' => $id_keuangan,
        'tgl_pengeluaran' => $tgl_pengeluaran,
        'keterangan' => $keterangan,
        'jum_pengeluaran' => $jum_pengeluaran,
    ];

    $this->ModelPengeluaran->update($id, $data_update);

    session()->setFlashdata('pesan', 'Data berhasil diupdate!');
    return redirect()->to(base_url('keuangan/pengeluaran/tampilan'));
}
}
