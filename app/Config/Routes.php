<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//Halaman Utama dan Navigasi
//Catatan : untuk form, ajax dan pemanggilan self php, jangan pake GET , pake add
$routes->add('/', 'Home::index');
$routes->add('daftar', 'Daftar::index');
$routes->add('agenda', 'Agenda::index');
$routes->add('kontak', 'Kontak::index');
$routes->add('login', 'Login::index');
$routes->add('artikel', 'Artikel::index');
$routes->post('artikel/desc_artikel', 'Desc_artikel::index');
$routes->add('fasilitas', 'Fasilitas::index');
$routes->add('pelayanan', 'Pelayanan::index');

//Dashboards
$routes->group('dashboard', function($routes)
{
    $routes->add('/', 'Dashboard\Dashboard::index');
    $routes->add('pelanggan', 'Dashboard\Pelanggan::index');
    $routes->add('agenda', 'Dashboard\Agenda::index');
    $routes->add('artikel', 'Dashboard\Artikel::index');
    $routes->add('dokter', 'Dashboard\Dokter::index');
    $routes->add('kontak', 'Dashboard\Kontak::index');
    $routes->add('logout', 'Dashboard\Logout::index');
});

// Routes untuk database
$routes->resource('pelanggan');
$routes->resource('dokter');
$routes->resource('users');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
