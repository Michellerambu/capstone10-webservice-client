<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Halaman Utama
$routes->get('/', 'Home::index', ['filter' => 'auth']);

// Auth
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

// Profile
$routes->get('profile', 'ProfileController::index', ['filter' => 'auth']);

// Keranjang
$routes->get('keranjang', 'TransaksiController::index', ['filter' => 'auth']);

// Group Produk
$routes->group('produk', ['filter' => 'auth'], function ($routes) {

    // tampil data produk
    $routes->get('', 'ProdukController::index');

    // tambah data produk
    $routes->post('', 'ProdukController::create');

    // edit data produk
    $routes->post('edit/(:any)', 'ProdukController::edit/$1');

    // hapus data produk
    $routes->get('delete/(:any)', 'ProdukController::delete/$1');
});