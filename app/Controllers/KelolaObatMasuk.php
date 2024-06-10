<?php

namespace App\Controllers;

use App\Models\ObatMasukModel;
use App\Controllers\BaseController;

class KelolaObatMasuk extends BaseController
{
    protected $obatMasukModel;
    public function __construct()
    {
        $this->obatMasukModel = new ObatMasukModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Obat Masuk',
            'obat_masuk' => $this->obatMasukModel->ObatMasuk(),
        ];
        return view('kelola_obat_masuk/index', $data);
    }

    // tambah obat masuk sementara
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Obat Masuk Belum Diterima',
            'validation' => \Config\Services::validation(),
            'obat_masuk_sementara' => $this->obatMasukModel->ObatMasukSementara(),
            'obat' => $this->obatMasukModel->getObat(),
            'jenis_obat' => $this->obatMasukModel->getJenisObat(),
            'supplier' => $this->obatMasukModel->getSupplier(),
        ];

        return view('kelola_obat_masuk/tambah', $data);
    }

    // fungsi untuk menyimpan data obat masuk sementara
    public function simpan_sementara()
    {
        $validationRules = [
            'id_obat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Obat Harus Diisi',
                ],
            ],
            'id_supplier' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Supplier Harus Diisi',
                ],

            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Jumlah Harus Diisi',
                ],
            ],

        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/obat-masuk/tambah')->withInput();
        }

        $this->obatMasukModel->save([
            'id_obat' => $this->request->getVar('id_obat'),
            'id_supplier' => $this->request->getVar('id_supplier'),
            'tanggal_masuk' => date('Y-m-d'),
            'jumlah' => $this->request->getVar('jumlah'),
            'status' => 'Belum Diterima',
            'nominal_harga' => $this->formatNumberWithoutSeparator($this->request->getPost('nominal_harga')),
            'total_harga' => $this->formatNumberWithoutSeparator($this->request->getPost('total_harga')),
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/obat-masuk/tambah');
    }

    private function formatNumberWithoutSeparator($number)
    {
        return str_replace(',', '', $number);
    }

    public function diterima($id)
    {
        // Periksa apakah ID valid
        if (!is_numeric($id) || $id <= 0) {
            return redirect()->to('/obat-masuk/tambah')->with('error', 'ID Obat Masuk tidak valid.');
        }

        $obatMasukModel = new \App\Models\ObatMasukModel(); // Load ObatMasukModel

        // Periksa apakah data obat masuk dengan ID tersebut ada
        $obatMasuk = $obatMasukModel->find($id);
        if (!$obatMasuk) {
            return redirect()->to('/obat-masuk/tambah')->with('error', 'Data Obat Masuk tidak ditemukan.');
        }

        $data = ['status' => 'Diterima']; // Data yang akan diupdate
        $obatMasukModel->update($id, $data); // Update data obat masuk

        // Tambahkan jumlah obat masuk ke stok obat
        $obatModel = new \App\Models\ObatModel(); // Load ObatModel
        $obat = $obatModel->find($obatMasuk['id_obat']); // Cari obat berdasarkan ID

        // Pastikan obat ditemukan
        if ($obat) {
            // Update stok obat
            $newStok = $obat['stok'] + $obatMasuk['jumlah']; // Tambahkan jumlah obat masuk ke stok obat
            $obatModel->update($obatMasuk['id_obat'], ['stok' => $newStok]); // Update stok obat
        }


        // Redirect kembali ke halaman obat masuk dengan pesan sukses
        session()->setFlashdata('success', 'Data Obat Masuk berhasil dipindahkan ke status "diterima".');
        return redirect()->to('/obat-masuk')->with('success', 'Data Obat Masuk berhasil dipindahkan ke status "diterima".');
    }

    // public function update($id)
    // {

    // }


    public function hapus($id)
    {
        $this->obatMasukModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/obat-masuk');
    }



}
