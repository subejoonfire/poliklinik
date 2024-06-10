<?php

namespace App\Models;

use CodeIgniter\Model;

class ObatKeluarModel extends Model
{
    protected $table = 'obat_keluar';
    protected $primaryKey = 'id_obat_keluar';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_obat_keluar', 'id_obat', 'id_jenis_obat', 'tanggal_keluar', 'jumlah'];



    public function getObatKeluar()
    {
        // join antara table obat dan jenis obat
        return $this->db->table('obat_keluar')
            ->join('obat', 'obat.id_obat = obat_keluar.id_obat')
            ->join('jenis_obat', 'jenis_obat.id_jenis = obat_keluar.id_jenis_obat')
            ->get()->getResultArray();
    }

    public function getObatKeluarSementara()
    {
        // join antara table obat dan jenis obat
        return $this->db->table('obat_keluar')
            ->join('obat', 'obat.id_obat = obat_keluar.id_obat')
            ->join('jenis_obat', 'jenis_obat.id_jenis = obat_keluar.id_jenis_obat')
            ->get()->getResultArray();
    }

    public function getObat()
    {
        return $this->db->table('obat')->get()->getResultArray();
    }
    public function getJenisObat()
    {
        return $this->db->table('jenis_obat')->get()->getResultArray();
    }


}
