<?php

namespace App\Controllers;

use App\Models\DashboardModel;
use App\Models\ObatMasukModel;
use App\Models\SupplierModel;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{

    protected $dashboardModel;
    protected $obatMasukModel;
    protected $supplierModel;

    public function __construct()
    {
        $this->dashboardModel = new DashboardModel();
        $this->obatMasukModel = new ObatMasukModel();
        $this->supplierModel = new SupplierModel();
    }


    public function index()
    {
        $supplierModel = new SupplierModel();

        $data['title'] = 'Dashboard';
        $data['jumlah_supplier'] = $supplierModel->jumlahSupplier();
        $data['jumlah_obat_masuk'] = $this->obatMasukModel->jumlahObatMasuk();

        return view('dashboard/index', $data);

    }
}