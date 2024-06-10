<?php

namespace App\Controllers;

use App\Models\ObatKeluarModel;
use App\Controllers\BaseController;

class KelolaObatKeluar extends BaseController
{

    protected $ObatKeluarModel;

    public function __construct()
    {
        $this->ObatKeluarModel = new ObatKeluarModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Obat Keluar',
            'obat_keluar' => $this->ObatKeluarModel->getObatKeluar()
        ];

        return view('kelola_obat_keluar/index', $data);
    }

    public function simpan()
    {
        if (
            !$this->validate([
                'id_obat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama obat harus diisi.'
                    ]
                ],
                'id_jenis_obat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis obat harus diisi.'
                    ]
                ],
                'tanggal_keluar' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal keluar harus diisi.'
                    ]
                ],
                'jumlah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jumlah obat harus diisi.'
                    ]
                ]
            ])
        ) {
            return redirect()->to('/kelola_obat_keluar/tambah')->withInput();
        }

        $this->ObatKeluarModel->save([
            'id_obat' => $this->request->getVar('id_obat'),
            'id_jenis_obat' => $this->request->getVar('id_jenis_obat'),
            'tanggal_keluar' => date('Y-m-d', strtotime($this->request->getVar('tanggal_keluar'))),
            'jumlah' => $this->request->getVar('jumlah')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/kelola_obat_keluar/tambah');
    }
}
