<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::login');
$routes->post('/loginAction', 'Dashboard::loginAction');
$routes->get('dashboard', 'Dashboard::index');
$routes->group('obat', function ($routes) {
    $routes->group('jenis-obat', function ($routes) {
        $routes->group('tampilan', function ($routes) {
            $routes->get('/', 'JenisObatViewController::index');
            $routes->get('tambah', 'JenisObatViewController::tambah');
            $routes->get('edit/(:num)', 'JenisObatViewController::edit/$1');
        });
        $routes->post('tambah', 'JenisObatController::tambah');
        $routes->get('hapus/(:num)', 'JenisObatController::hapus/$1');
        $routes->post('edit/(:num)', 'JenisObatController::edit/$1');
    });

    $routes->group('kelola-obat', function ($routes) {
        $routes->group('tampilan', function ($routes) {
            $routes->get('/', 'KelolaObatViewController::index');
            $routes->get('tambah', 'KelolaObatViewController::tambah');
            $routes->get('edit/(:any)', 'KelolaObatViewController::edit/$1');
        });
        $routes->post('tambah', 'KelolaObatController::tambah');
        $routes->get('hapus/(:any)', 'KelolaObatController::hapus/$1');
        $routes->post('edit/(:any)', 'KelolaObatController::edit/$1');
    });

    $routes->group('obat-keluar', function ($routes) {
        $routes->group('tampilan', function ($routes) {
            $routes->get('/', 'ObatKeluarViewController::index');
            $routes->get('tambah', 'ObatKeluarViewController::tambah');
            $routes->get('edit/(:num)', 'ObatKeluarViewController::edit/$1');
        });
        $routes->post('tambah', 'ObatKeluarController::tambah');
        $routes->get('hapus/(:num)', 'ObatKeluarController::hapus/$1');
        $routes->post('edit/(:num)', 'ObatKeluarController::edit/$1');
    });

    $routes->group('obat-masuk', function ($routes) {
        $routes->group('tampilan', function ($routes) {
            $routes->get('/', 'ObatMasukViewController::index');
            $routes->get('tambah', 'ObatMasukViewController::tambah');
            $routes->get('edit/(:any)', 'ObatMasukViewController::edit/$1');
        });
        $routes->post('tambah', 'ObatMasukController::tambah');
        $routes->get('hapus/(:any)', 'ObatMasukController::hapus/$1');
        $routes->post('edit/(:any)', 'ObatMasukController::edit/$1');
    });
});
// routes kelola supplier
$routes->get('/kelola-supplier', 'KelolaSupplier::index');
$routes->get('/kelola-supplier/tambah', 'KelolaSupplier::tambah');
$routes->post('/kelola-supplier/simpan', 'KelolaSupplier::simpan');
$routes->get('/kelola-supplier/edit/(:num)', 'KelolaSupplier::edit/$1');
$routes->post('/kelola-supplier/update/(:num)', 'KelolaSupplier::update/$1');
$routes->get('/kelola-supplier/hapus/(:num)', 'KelolaSupplier::hapus/$1');



$routes->group('keuangan', function ($routes) {
    $routes->group('keuangan', function ($routes) {
        $routes->group('tampilan', function ($routes) {
            $routes->get('/', 'KeuanganViewController::index');
            $routes->get('tambah', 'KeuanganViewController::tambah');
            $routes->get('edit/(:num)', 'KeuanganViewController::edit/$1');
        });
        $routes->post('tambah', 'KeuanganController::tambah');
        $routes->get('hapus/(:num)', 'KeuanganController::hapus/$1');
        $routes->post('edit/(:num)', 'KeuanganController::edit/$1');
    });

    $routes->group('saldo', function ($routes) {
        $routes->group('tampilan', function ($routes) {
            $routes->get('/', 'SaldoViewController::index');
            $routes->get('tambah', 'SaldoViewController::tambah');
            $routes->get('edit/(:num)', 'SaldoViewController::edit/$1');
        });
        $routes->post('tambah', 'SaldoController::tambah');
        $routes->get('hapus/(:num)', 'SaldoController::hapus/$1');
        $routes->post('edit/(:num)', 'SaldoController::edit/$1');
    });

    $routes->group('pengeluaran', function ($routes) {
        $routes->group('tampilan', function ($routes) {
            $routes->get('/', 'PengeluaranViewController::index');
            $routes->get('tambah', 'PengeluaranViewController::tambah');
            $routes->get('edit/(:num)', 'PengeluaranViewController::edit/$1');
        });
        $routes->post('tambah', 'PengeluaranController::tambah');
        $routes->get('hapus/(:num)', 'PengeluaranController::hapus/$1');
        $routes->post('edit/(:num)', 'PengeluaranController::edit/$1');
    });

    $routes->group('pemasukan', function ($routes) {
        $routes->group('tampilan', function ($routes) {
            $routes->get('/', 'PemasukanViewController::index');
            $routes->get('tambah', 'PemasukanViewController::tambah');
            $routes->get('edit/(:num)', 'PemasukanViewController::edit/$1');
        });
        $routes->post('tambah', 'PemasukanController::tambah');
        $routes->get('hapus/(:num)', 'PemasukanController::hapus/$1');
        $routes->post('edit/(:num)', 'PemasukanController::edit/$1');
    });
});
