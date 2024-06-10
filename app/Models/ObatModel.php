<?php

namespace App\Models;

use CodeIgniter\Model;

class ObatModel extends Model
{
    protected $table = 'obat';
    protected $primaryKey = 'id_obat';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_jenis_obat', 'kode_obat', 'nama_obat', 'harga', 'harga_jual', 'stok'];


    public function getObat()
    {
        return $this->db->table('obat')
            ->join('jenis_obat', 'jenis_obat.id_jenis = obat.id_jenis_obat')
            ->get()->getResultArray();
    }

    public function find($id = null)
    {
        return $this->db->table('obat')
            ->join('jenis_obat', 'jenis_obat.id_jenis = obat.id_jenis_obat')
            ->where(['id_obat' => $id])
            ->get()->getRowArray();
    }

    public function getJenisObat()
    {
        return $this->db->table('jenis_obat')->get()->getResultArray();
    }



}
