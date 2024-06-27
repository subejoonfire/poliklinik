<?php

namespace App\Controllers;

use App\Models\ObatMasukModel;
use App\Controllers\BaseController;

class KelolaObatMasuk extends BaseController
{
    protected $ObatMasukModel;
    public function __construct()
    {
        $this->ObatMasukModel = new ObatMasukModel();
    }

    
}
