<?php

namespace App\Controllers;

use App\Models\ModelKeuangan;
use App\Models\JenisObatModel;
use App\Models\ModelPemasukan;
use App\Controllers\BaseController;

class PemasukanController extends BaseController
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
    public function tambah()
    {
        $id_keuangan = $this->request->getVar('id_keuangan');
        $tgl_pemasukan = $this->request->getVar('tgl_pemasukan');
        $keterangan = $this->request->getPost('keterangan');
        $jum_pemasukan = $this->request->getVar('jum_pemasukan');
        if (empty($id_keuangan) || empty($tgl_pemasukan) || empty($keterangan) || empty($jum_pemasukan)) {
            return redirect()->back()->with('pesan', 'Semua field harus diisi!');
        }

        $data = [
            'id_keuangan' => $id_keuangan,
            'tgl_pemasukan' => $tgl_pemasukan,
            'id_obat' => $keterangan,
            'jum_pemasukan' => $jum_pemasukan,
        ];
        $this->ModelPemasukan->insert($data);

        session()->setFlashdata('pesan', 'Data berhasil disimpan!');
        return redirect()->to(base_url('/keuangan/pemasukan/tampilan'));
    }

    public function hapus($id)
    {
        if (empty($id)) {
            return redirect()->back()->with('pesan', 'ID tidak boleh kosong!');
        }

        $this->ModelPemasukan->where('id_pemasukan', $id);
        $data = $this->ModelPemasukan->find();

        if (!$data) {
            return redirect()->back()->with('pesan', 'Data tidak ditemukan!');
        }

        $this->ModelPemasukan->delete($id);

        return redirect()->back()->with('pesan', 'Data berhasil dihapus!');
    }

    public function edit($id)
    {
        $data = $this->ModelPemasukan->find($id);

        if (!$data) {
            return redirect()->back()->with('pesan', 'Data tidak ditemukan!');
        }

        $id_keuangan = $this->request->getVar('id_keuangan');
        $tgl_pemasukan = $this->request->getVar('tgl_pemasukan');
        $id_obat = $this->request->getVar('id_obat');
        $jum_pemasukan = $this->request->getVar('jum_pemasukan');

        if (empty($id_keuangan) || empty($tgl_pemasukan) || empty($id_obat) || empty($jum_pemasukan)) {
            return redirect()->back()->with('pesan', 'Semua field harus diisi!');
        }

        $data_update = [
            'id_keuangan' => $id_keuangan,
            'tgl_pemasukan' => $tgl_pemasukan,
            'id_obat' => $id_obat,
            'jum_pemasukan' => $jum_pemasukan,
        ];

        $this->ModelPemasukan->update($id, $data_update);

        session()->setFlashdata('pesan', 'Data berhasil diupdate!');
        return redirect()->to(base_url('keuangan/pemasukan/tampilan'));
    }
}
