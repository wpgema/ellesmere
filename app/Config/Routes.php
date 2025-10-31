<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('/login', 'Auth::index');
$routes->post('/login', 'Auth::index');

if(session()->has("authOwner")){
    $routes->get('/', 'Owner\Kasir::index');
    $routes->post('/', 'Owner\Kasir::index');

    // url untuk mengelola data karyawan
    $routes->get('/karyawan', 'Owner\Karyawan::index');
    $routes->post('/karyawan', 'Owner\Karyawan::index');
    $routes->put('/karyawan/(:num)', 'Owner\Karyawan::ubahData/$1');
    $routes->post('/karyawan/(:num)', 'Owner\Karyawan::prosesUbahData/$1');
    $routes->delete('/karyawan/(:num)', 'Owner\Karyawan::hapusData/$1');

    // url untuk mengelola data supplier
    $routes->get('/supplier', 'Owner\Supplier::index');
    $routes->get('/supplier/(:num)', 'Owner\Supplier::index');
    $routes->post('/supplier/(:num)', 'Owner\Supplier::prosesUbahData/$1');
    $routes->delete('/hapuspesanan/(:num)/(:num)', 'Owner\Supplier::hapusDataPesananBarang/$1/$2');
    $routes->post('/supplier', 'Owner\Supplier::index');
    $routes->put('/supplier/(:num)', 'Owner\Supplier::ubahData/$1');
    $routes->post('/supplier/(:num)', 'Owner\Supplier::prosesUbahData/$1');
    $routes->delete('/supplier/(:num)', 'Owner\Supplier::hapusData/$1');

    // url untuk mengelola data product
    $routes->get('/produk', 'Owner\Product::index');
    $routes->post('/produk', 'Owner\Product::index');
    $routes->put('/produk/(:num)', 'Owner\Product::ubahData/$1');
    $routes->post('/produk/(:num)', 'Owner\Product::prosesUbahData/$1');
    $routes->delete('/produk/(:num)', 'Owner\Product::hapusData/$1');

    // url untuk mengelola data customer umum
    $routes->get('/pelanggan-umum', 'Owner\GeneralCustomer::index');
    $routes->get('/pelanggan-umum/(:num)', 'Owner\GeneralCustomer::detail/$1');

    // url untuk mengelola data customer umum
    $routes->get('/penjualan', 'Owner\Penjualan::index');
    $routes->get('/penjualan/(:num)', 'Owner\Penjualan::detail/$1');
    $routes->delete('/penjualan/(:any)', 'Owner\Penjualan::hapus/$1');

    // url untuk mengelola pengeluaran (expenditures)
    $routes->get('/pengeluaran', 'Owner\Expenditures::index');
    $routes->post('/pengeluaran', 'Owner\Expenditures::index');
    $routes->put('/pengeluaran/(:num)', 'Owner\Expenditures::edit/$1');
    $routes->post('/pengeluaran/(:num)', 'Owner\Expenditures::update/$1');
    $routes->delete('/pengeluaran/(:num)', 'Owner\Expenditures::delete/$1');

    $routes->get('/struk/(:num)', 'Struk\struk::index/$1');

    // url untuk mengelola data kasir
    $routes->get('/kasir', 'Owner\Kasir::index');
    $routes->post('/kasir', 'Owner\Kasir::index');
    $routes->delete('/kasir/(:num)', 'Owner\Kasir::hapusData/$1');

    $routes->get('/laporan-penjualan', 'Owner\Laporan::laporanpenjualanbulanan');
    $routes->get('/laporan-penjualan/(:any)', 'Owner\Laporan::laporanpenjualanharian/$1');
    $routes->get('/laporan-pengeluaran', 'Owner\Laporan::laporanpengeluaranbulanan');
    $routes->get('/laporan-pengeluaran/(:any)', 'Owner\Laporan::laporanpengeluaranharian/$1');

    // url untuk mengelola data rekening
    $routes->get('/qris', 'Owner\Qris::index');
    $routes->post('/qris', 'Owner\Qris::index');
    $routes->delete('/qris/(:num)', 'Owner\Qris::hapusData/$1');

    $routes->get('/keluar', 'Logout::index');
}

if(session()->has("authKasir")){
    $routes->get('/', 'Kasir\Kasir::index');
    $routes->post('/', 'Kasir\Kasir::index');

    $routes->get('/kasir', 'Kasir\Kasir::index');
    $routes->post('/kasir', 'Kasir\Kasir::index');
    $routes->delete('/kasir/(:num)', 'Kasir\Kasir::hapusData/$1');
    
    $routes->get('/keluar', 'Logout::index');
}

$routes->get('/(:any)', 'Auth::index');
$routes->post('/(:any)', 'Auth::index');