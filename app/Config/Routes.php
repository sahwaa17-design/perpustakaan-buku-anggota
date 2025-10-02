<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'pages::index');
$routes->get('/buku', 'Buku::index');
$routes->get('/home', 'home::index');

$routes->get('/buku/tambah', 'Buku::tambah');
$routes->put('/buku/update/(:num)', 'Buku::update/$1');
$routes->get('/buku/ubah/(:num)', 'Buku::ubah/$1');
$routes->post('/buku/simpan', 'Buku::simpan');
$routes->delete('/buku/(:num)', 'Buku::hapus/$1');
$routes->get('/buku/(:any)', 'Buku::detail/$1');
$routes->post('/buku/cari', 'Buku::index');

//Anggota//
$routes->get('/anggota', 'Anggota::index'); 
$routes->get('/anggota/tambah', 'Anggota::tambah');
$routes->post('/anggota/update/(:any)', 'Anggota::update/$1');
$routes->get('/anggota/ubah/(:num)', 'Anggota::ubah/$1');
$routes->post('/anggota/simpan', 'Anggota::simpan');
$routes->delete('/anggota/(:num)', 'Anggota::hapus/$1');
$routes->get('/anggota/(:any)', 'Anggota::detail/$1');
$routes->post('/anggota/cari', 'Anggota::index');
//num angka saja menangkap, any semua bisa

