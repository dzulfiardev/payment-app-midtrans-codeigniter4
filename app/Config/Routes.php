<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Midtrans::index', ['filter' => 'role:admin,user']);
$routes->get('/user', 'User::index', ['filter' => 'role:admin,user']);

// Auth Routes
// $routes->get('/login', 'Auth::index');
// $routes->get('/register', 'Auth::register');

$routes->get('/pembayaran', 'Midtrans::pembayaran', ['filter' => 'role:admin,user']);
// $routes->get('/user', 'Midtrands::user', ['filter' => 'role:admin,user']);
$routes->post('/midtrans/token', 'Midtrans::token', ['filter' => 'role:admin,user']);
$routes->post('/midtrans/excel', 'Midtrans::excel', ['filter' => 'role:admin,user']);

$routes->get('/user', 'User::index', ['filter' => 'role:admin,user']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
