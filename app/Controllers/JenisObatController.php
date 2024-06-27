<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJenisObat;

class JenisObatController extends BaseController
{

    public $ModelJenisObat;
    public function __construct()
    {
        $this->ModelJenisObat = new ModelJenisObat();
    }
    public function tambah()
    {
        if ($this->request->getPost('jenis_obat')) {
            $data = [
                'jenis_obat' => $this->request->getPost('jenis_obat')
            ];
            $this->ModelJenisObat->insert($data);
            return redirect()->to('obat/jenis-obat/tampilan');
        } else {
            return view('obat/jenis-obat/tampilan/tambah');
        }
    }

    public function edit($id_obat)
    {
        $data['jenis_obat'] = $this->ModelJenisObat->find($id_obat);
        if ($this->request->getPost('jenis_obat')) {
            $data = [
                'jenis_obat' => $this->request->getPost('jenis_obat')
            ];
            $this->ModelJenisObat->update($id_obat, $data);
            return redirect()->to('obat/jenis-obat/tampilan');
        } else {
            return view('obat/jenis-obat/tampilan/edit', $data);
        }
    }

    public function hapus($id_obat)
    {
        $this->ModelJenisObat->delete($id_obat);
        return redirect()->to('obat/jenis-obat/tampilan');
    }
}
