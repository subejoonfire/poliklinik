<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');

// routes jenis obat
$routes->get('/jenis-obat', 'JenisObat::index');
$routes->get('/jenis-obat/tambah', 'JenisObat::tambah');
$routes->post('/jenis-obat/simpan', 'JenisObat::simpan');
$routes->get('/jenis-obat/edit/(:num)', 'JenisObat::edit/$1');
$routes->post('/jenis-obat/update/(:num)', 'JenisObat::update/$1');
$routes->get('/jenis-obat/hapus/(:num)', 'JenisObat::hapus/$1');

// routes kelola obat
$routes->get('/kelola-obat', 'KelolaObat::index');
$routes->get('/kelola-obat/tambah', 'KelolaObat::tambah');
$routes->post('/kelola-obat/simpan', 'KelolaObat::simpan');
$routes->get('/kelola-obat/edit/(:num)', 'KelolaObat::edit/$1');
$routes->post('/kelola-obat/update/(:num)', 'KelolaObat::update/$1');
$routes->get('/kelola-obat/hapus/(:num)', 'KelolaObat::hapus/$1');

// routes kelola supplier
$routes->get('/kelola-supplier', 'KelolaSupplier::index');
$routes->get('/kelola-supplier/tambah', 'KelolaSupplier::tambah');
$routes->post('/kelola-supplier/simpan', 'KelolaSupplier::simpan');
$routes->get('/kelola-supplier/edit/(:num)', 'KelolaSupplier::edit/$1');
$routes->post('/kelola-supplier/update/(:num)', 'KelolaSupplier::update/$1');
$routes->get('/kelola-supplier/hapus/(:num)', 'KelolaSupplier::hapus/$1');

// routes obat masuk 
$routes->get('/obat-masuk', 'KelolaObatMasuk::index');
$routes->get('/obat-masuk/tambah', 'KelolaObatMasuk::tambah');
$routes->post('/obat-masuk/simpan', 'KelolaObatMasuk::simpan');
$routes->post('/obat-masuk/simpan-sementara', 'KelolaObatMasuk::simpan_sementara');
$routes->get('/obat-masuk/diterima/(:num)', 'KelolaObatMasuk::diterima/$1');
$routes->get('/obat-masuk/edit/(:num)', 'KelolaObatMasuk::edit/$1');
$routes->post('/obat-masuk/update/(:num)', 'KelolaObatMasuk::update/$1');
$routes->get('/obat-masuk/hapus/(:num)', 'KelolaObatMasuk::hapus/$1');


// routes obat keluar
$routes->get('/obat-keluar', 'KelolaObatKeluar::index');
$routes->post('/obat-keluar/simpan', 'KelolaObatKeluar::simpan');
$routes->get('/obat-keluar/edit/(:num)', 'KelolaObatKeluar::edit/$1');
$routes->post('/obat-keluar/update/(:num)', 'KelolaObatKeluar::update/$1');
$routes->get('/obat-keluar/hapus/(:num)', 'KelolaObatKeluar::hapus/$1');


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
