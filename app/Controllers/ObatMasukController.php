<?php

namespace App\Controllers;

use App\Models\ObatModel;
use App\Models\StokModel;
use App\Models\RiwayatModel;
use App\Models\ModelKeuangan;
use App\Controllers\BaseController;

class ObatMasukController extends BaseController
{
    public $ObatModel, $StokModel, $RiwayatModel;

    public function __construct()
    {
        $this->ObatModel = new ObatModel();
        $this->StokModel = new StokModel();
        $this->RiwayatModel = new RiwayatModel();
    }
    public function tambah()
    {
        $kode_obat = $this->request->getPost('nama_obat');
        $stokAwal = $this->StokModel->where('kode_obat', $kode_obat)->first();
        if (!$stokAwal) {
            $stokAwal = [
                'kode_obat' => $kode_obat,
                'stok' => 0,
            ];
            $this->StokModel->insert($stokAwal);
            $idstok = $this->StokModel->getInsertID(); // Get the newly inserted ID
        } else {
            $idstok = $stokAwal['idstok'];
        }

        $stok = $stokAwal['stok'] ?? 0;
        $jumlah = $this->request->getPost('jumlah');
        $stokAkhir = $stok + $jumlah;

        if ($stokAkhir <= 0) {
            return redirect()->back()->with('Gagal', 'Terjadi kesalahan, periksa lagi');
        }

        $data = [
            'stok' => $stokAkhir,
        ];
        $this->StokModel->where('kode_obat', $kode_obat)->set($data)->update();

        $data2 = [
            'idstok' => $idstok, // Use the newly inserted ID or the existing one
            'kode_obat' => $kode_obat,
            'tanggal' => date('Y-m-d'),
            'keterangan' => 'Masuk',
            'klasifikasi' => $this->request->getPost('klasifikasi'),
            'produsen' => $this->request->getPost('produsen'),
            'suplier' => $this->request->getPost('supplier'),
            'harga' => $this->request->getPost('harga'),
            'jumlah' => $jumlah,
            'total' => $this->request->getPost('harga') * $jumlah,
        ];
        $this->RiwayatModel->insert($data2);

        return redirect()->to(base_url('obat/obat-masuk/tampilan'))->with('pesan', 'Data berhasil ditambahkan');
    }

    public function hapus($id)
    {
        $this->RiwayatModel->where('idriwayat', $id)->delete();
        return redirect()->to(base_url('obat/obat-masuk/tampilan'))->with('pesan', 'Data berhasil dihapus');
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

        return redirect()->to(base_url('obat/obat-masuk/tampilan'))->with('pesan', 'Data berhasil diedit');
    }
}
