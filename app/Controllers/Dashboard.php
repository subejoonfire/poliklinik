<?php

namespace App\Controllers;

use App\Models\DashboardModel;
use App\Models\ObatModel;
use App\Models\SupplierModel;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{

    protected $dashboardModel;
    protected $ObatModel;
    protected $supplierModel;

    public function __construct()
    {
        $this->dashboardModel = new DashboardModel();
        $this->ObatModel = new ObatModel();
        $this->supplierModel = new SupplierModel();
    }


    public function index()
    {
        $supplierModel = new SupplierModel();

        $data['title'] = 'Dashboard';
        $data['jumlah_supplier'] = 10;
        $data['jumlah_obat_masuk'] = 10;

        return view('dashboard/index', $data);
    }
}
