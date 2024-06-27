<?php

namespace App\Controllers;

use App\Models\JenisObatModel;
use App\Models\ModelObatKeluar;
use App\Controllers\BaseController;

class ObatKeluarController extends BaseController
{
    public $ModelObatKeluar;
    public $ModelJenisObat;

    public function __construct()
    {
        $this->ModelObatKeluar = new ModelObatKeluar();
        $this->ModelJenisObat = new JenisObatModel();
    }
    public function tambah()
    {
        $this->ModelObatKeluar->insert([
            'id_obat' => $this->request->getPost('id_obat'),
            'tanggal_keluar' => $this->request->getPost('tanggal_keluar'),
            'jumlah' => $this->request->getPost('jumlah'),
            'total_harga' => $this->request->getPost('total_harga'),
        ]);

        return redirect()->to(base_url('obat/obat-keluar/tampilan'))->with('pesan', 'Data berhasil ditambahkan');
    }

    public function hapus($id)
    {
        $this->ModelObatKeluar->delete($id);

        return redirect()->to(base_url('obat/obat-keluar/tampilan'))->with('pesan', 'Data berhasil dihapus');
    }
    public function edit($id)
    {
        $data = [
            'id_obat' => $this->request->getPost('id_obat'),
            'tanggal_keluar' => $this->request->getPost('tanggal_keluar'),
            'jumlah' => $this->request->getPost('jumlah'),
            'total_harga' => $this->request->getPost('total_harga'),
        ];

        $this->ModelObatKeluar->update($id, $data);

        return redirect()->to(base_url('obat/obat-keluar/tampilan'))->with('pesan', 'Data berhasil diedit');
    }
}
