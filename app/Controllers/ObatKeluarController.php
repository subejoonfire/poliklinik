<?php

namespace App\Controllers;

use App\Models\ObatModel;
use App\Models\StokModel;
use App\Models\RiwayatModel;
use App\Models\ModelKeuangan;
use App\Models\JenisObatModel;
use App\Models\KandunganModel;
use App\Models\ModelObatKeluar;
use App\Controllers\BaseController;

class ObatKeluarController extends BaseController
{
    public $ModelKeuangan;
    public $StokModel;
    public $KandunganModel;
    public $ObatModel;
    public $RiwayatModel;
    public function __construct()
    {
        $this->StokModel = new StokModel();
        $this->KandunganModel = new KandunganModel();
        $this->ModelKeuangan = new ModelKeuangan();
        $this->RiwayatModel = new RiwayatModel();
        $this->ObatModel = new ObatModel();
    }
    public function tambah()
    {
        $kode_obat = $this->request->getPost('nama_obat');
        $stokAwal = $this->StokModel->where('kode_obat', $kode_obat)->first();
        $stok = $stokAwal['stok'];
        $stokAkhir = $stok - $this->request->getPost('jumlah');
        if ($stokAkhir <= 0) {
            return redirect()->back()->with('Gagal', 'Terjadi kesalahan, periksa lagi');
        }
        $data = [
            'stok' => $stokAkhir,
        ];
        $data2 = [
            'idstok' => $stokAwal['idstok'],
            'kode_obat' => $this->request->getPost('nama_obat'),
            'tanggal' => date('Y-m-d'),
            'keterangan' => 'Keluar',
            'jumlah' => $this->request->getPost('jumlah'),
        ];
        $this->RiwayatModel->insert($data2);

        $this->StokModel->set($data)->where('kode_obat', $kode_obat)->update();

        return redirect()->to(base_url('obat/obat-keluar/tampilan'))->with('pesan', 'Data berhasil ditambahkan');
    }

    public function hapus($id)
    {
        $this->RiwayatModel->where('idriwayat', $id)->delete();

        return redirect()->to(base_url('obat/obat-keluar/tampilan'))->with('pesan', 'Data berhasil dihapus');
    }
    public function edit($id)
    {
        $data = [
            'kode_obat' => $this->request->getPost('nama_obat'),
            'tanggal' => date('Y-m-d'),
            'keterangan' => 'Masuk',
            'klasifikasi' => $this->request->getPost('klasifikasi'),
            'produsen' => $this->request->getPost('produsen'),
            'suplier' => $this->request->getPost('supplier'),
            'harga' => $this->request->getPost('harga'),
            'jumlah' => $this->request->getPost('jumlah'),
            'total' => $this->request->getPost('harga') * $this->request->getPost('jumlah'),
        ];

        $this->ObatModel->update($id, $data);
        return redirect()->to(base_url('obat/obat-keluar/tampilan'))->with('pesan', 'Data berhasil diedit');
    }
}
