<?php

namespace App\Controllers;

use App\Models\ObatModel;
use App\Models\UserModel;
use App\Models\SupplierModel;
use App\Models\DashboardModel;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{

    protected $dashboardModel;
    protected $ObatModel;
    protected $supplierModel;
    protected $UserModel;

    public function __construct()
    {
        $this->dashboardModel = new DashboardModel();
        $this->ObatModel = new ObatModel();
        $this->supplierModel = new SupplierModel();
        $this->UserModel = new UserModel();
    }


    public function index()
    {
        $supplierModel = new SupplierModel();

        $data['title'] = 'Dashboard';
        $data['jumlah_supplier'] = 10;
        $data['jumlah_obat_masuk'] = 10;

        return view('dashboard/index', $data);
    }
    public function login()
    {
        return view('login');
    }
    public function loginAction()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user) {
            if ($password ==  $user['password']) {
                session()->set('logged_in', true);
                session()->set('username', $username);
                session()->set('role', $user['role']);
                return redirect()->to('dashboard');
            } else {
                session()->setFlashdata('pesan', 'Invalid password');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('pesan', 'Username not found');
            return redirect()->back();
        }
    }
}
