<?php

namespace App\Controllers;

use App\Models\KandunganModel;
use App\Models\ObatModel;
use App\Controllers\BaseController;

class KelolaObatController extends BaseController
{
    public $ObatModel, $KandunganModel;

    public function __construct()
    {
        $this->ObatModel = new ObatModel();
        $this->KandunganModel = new KandunganModel();
    }

    public function tambah()
    {
        if ($this->request->getPost()) {
            $data = [
                'kode_obat' => $this->request->getPost('kode_obat'),
                'namaobat' => $this->request->getPost('namaobat'),
                'idkandungan' => $this->request->getPost('idkandungan'),
            ];
            $this->ObatModel->insert($data);
            return redirect()->to('obat/kelola-obat/tampilan');
        } else {
            $data['jenisobat'] = $this->KandunganModel->findAll();
            return view('obat/kelola-obat/tambah', $data);
        }
    }

    public function edit($id_obat)
    {
        $data['obat'] = $this->ObatModel->find($id_obat);
        $data['jenisobat'] = $this->KandunganModel->findAll();
        if ($this->request->getPost()) {
            $data = [
                'kode_obat' => $this->request->getPost('kode_obat'),
                'namaobat' => $this->request->getPost('namaobat'),
                'idkandungan' => $this->request->getPost('idkandungan')
            ];
            $this->ObatModel->update($id_obat, $data);
            return redirect()->to('obat/kelola-obat/tampilan');
        } else {
            return view('obat/kelola-obat/edit', $data);
        }
    }

    public function hapus($id_obat)
    {
        $this->ObatModel->delete($id_obat);
        return redirect()->to('obat/kelola-obat/tampilan');
    }
}
