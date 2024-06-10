<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'id_supplier';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_supplier', 'kode_supplier', 'alamat', 'nomer_hp'];


    public function jumlahSupplier()
    {
        return $this->db->table('supplier')->countAllResults();
    }

}
