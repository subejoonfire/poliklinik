<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KandunganModel;

class JenisObatController extends BaseController
{

    public $KandunganModel;
    public function __construct()
    {
        $this->KandunganModel = new KandunganModel();
    }
    public function tambah()
    {
        if ($this->request->getPost('kandungan')) {
            $data = [
                'kandungan' => $this->request->getPost('kandungan')
            ];
            $this->KandunganModel->insert($data);
            return redirect()->to('obat/jenis-obat/tampilan');
        } else {
            return view('obat/jenis-obat/tampilan/tambah');
        }
    }

    public function edit($id_obat)
    {
        $data['kandungan'] = $this->KandunganModel->find($id_obat);
        if ($this->request->getPost('kandungan')) {
            $data = [
                'kandungan' => $this->request->getPost('kandungan')
            ];
            $this->KandunganModel->update($id_obat, $data);
            return redirect()->to('obat/jenis-obat/tampilan');
        } else {
            return view('obat/jenis-obat/tampilan/edit', $data);
        }
    }

    public function hapus($id_obat)
    {
        $this->KandunganModel->delete($id_obat);
        return redirect()->to('obat/jenis-obat/tampilan');
    }
}
