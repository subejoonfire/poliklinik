<?php

namespace App\Models;

use CodeIgniter\Model;

class ObatMasukModel extends Model
{

    protected $table = 'obat_masuk';
    protected $primaryKey = 'id_obat_masuk';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_obat', 'id_supplier', 'nama_obat', 'tanggal_masuk', 'jumlah', 'status', 'nominal_harga', 'total_harga',];

    public function ObatMasukSementara()
    {
        // join dengan tabel obat dan supplier
        return $this->db->table('obat_masuk')
            ->join('obat', 'obat.id_obat = obat_masuk.id_obat')
            ->join('supplier', 'supplier.id_supplier = obat_masuk.id_supplier')
            ->where('status', 'Belum Diterima') // status belum diterima
            ->get()->getResultArray();

    }

    public function ObatMasuk()
    {
        return $this->db->table('obat_masuk')
            ->join('obat', 'obat.id_obat = obat_masuk.id_obat')
            ->join('supplier', 'supplier.id_supplier = obat_masuk.id_supplier')
            ->where('status', 'Diterima') // status diterima
            ->get()->getResultArray();
    }

    public function jumlahObatMasuk()
    {
        return $this->db->table('obat_masuk')
            ->where('status', 'Belum Diterima')
            ->countAllResults();
    }

    public function getJenisObat()
    {
        return $this->db->table('jenis_obat')->get()->getResultArray();
    }

    public function getObat()
    {
        return $this->db->table('obat')->get()->getResultArray();
    }

    public function getSupplier()
    {
        return $this->db->table('supplier')->get()->getResultArray();
    }
}
