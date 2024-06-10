<?php

namespace App\Controllers;

use App\Models\SupplierModel;
use App\Controllers\BaseController;

class KelolaSupplier extends BaseController
{

    protected $supplierModel;
    public function __construct()
    {
        $this->supplierModel = new SupplierModel();
    }

    public function index()
    {
        $data['title'] = 'Kelola Supplier';
        $data['supplier'] = $this->supplierModel->findAll();
        return view('supplier/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Supplier',
            'validation' => \Config\Services::validation()
        ];
        return view('supplier/tambah', $data);
    }

    public function simpan()
    {
        if (
            !$this->validate([
                'nama_supplier' => [
                    'rules' => 'required|is_unique[supplier.nama_supplier]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                        'is_unique' => '{field} sudah terdaftar.'
                    ]
                ],
                'kode_supplier' => [
                    'rules' => 'required|is_unique[supplier.kode_supplier]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                        'is_unique' => '{field} sudah terdaftar.'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.'
                    ]
                ],
                'nomer_hp' => [
                    'rules' => 'required|is_unique[supplier.nomer_hp]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                        'is_unique' => '{field} sudah terdaftar.'
                    ]
                ]
            ])
        ) {
            return redirect()->to('/kelola-supplier/tambah')->withInput();
        }

        $this->supplierModel->save([
            'nama_supplier' => $this->request->getVar('nama_supplier'),
            'kode_supplier' => $this->request->getVar('kode_supplier'),
            'alamat' => $this->request->getVar('alamat'),
            'nomer_hp' => $this->request->getVar('nomer_hp')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/kelola-supplier');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Supplier',
            'validation' => \Config\Services::validation(),
            'supplier' => $this->supplierModel->find($id)
        ];
        return view('supplier/edit', $data);
    }

    public function update($id)
    {


        $id_suppplier = $this->request->getVar('id_supplier');
        $nama_supplier = $this->request->getVar('nama_supplier');
        $kode_supplier = $this->request->getVar('kode_supplier');
        $alamat = $this->request->getVar('alamat');
        $nomer_hp = $this->request->getVar('nomer_hp');

        $data = [
            'id_supplier' => $id_suppplier,
            'nama_supplier' => $nama_supplier,
            'kode_supplier' => $kode_supplier,
            'alamat' => $alamat,
            'nomer_hp' => $nomer_hp
        ];

        $this->supplierModel->update($id, $data);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/kelola-supplier');

    }

    public function hapus($id)
    {
        $this->supplierModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/kelola-supplier');
    }


}
