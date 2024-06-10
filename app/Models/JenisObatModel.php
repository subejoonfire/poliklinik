<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisObatModel extends Model
{

    protected $table = 'jenis_obat';
    protected $primaryKey = 'id_jenis_obat';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['jenis_obat'];

}
