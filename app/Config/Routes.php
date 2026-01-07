<?php

use CodeIgniter\Router\RouteCollection;

// Halaman Utama
$routes->get('/', 'ItemController::index');

// CRUD Barang Master
$routes->get('items/create', 'ItemController::create');
$routes->post('items/store', 'ItemController::store');
$routes->get('items/edit/(:num)', 'ItemController::edit/$1');
$routes->post('items/update/(:num)', 'ItemController::update/$1');
$routes->get('items/delete/(:num)', 'ItemController::delete/$1');

// Manajemen Stok (Fitur Khusus)
$routes->get('items/stock/(:num)', 'ItemController::manageStock/$1');
$routes->post('items/stock-update/(:num)', 'ItemController::updateStock/$1');
