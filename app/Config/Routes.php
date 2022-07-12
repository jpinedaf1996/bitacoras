<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Usuarios');
$routes->setDefaultController('RecordController');
$routes->setDefaultController('HistoryController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Usuarios::index');
$routes->get('/home', 'Usuarios::home');
$routes->post('/login', 'Usuarios::login');
$routes->get('/exit', 'Usuarios::exit');

$routes->get('/registro', 'RecordController::registro');
$routes->get('/registro/validar', 'RecordController::statusValidate');
$routes->post('/registro/getDetalle', 'RecordController::getDetalle');
$routes->get('/registro/paises', 'RecordController::Countries');
$routes->get('/registro/getCustomers', 'RecordController::getDataToForm');
$routes->post('/registro/deleteDetalle', 'RecordController::deleteDetalle');
$routes->post('/registro/send', 'RecordController::send');
$routes->post('/registro/cancel', 'RecordController::deleteBitacora');

$routes->post('/registro/add', 'RecordController::add');//asegurar rutas
$routes->post('/registro/add-detalles', 'RecordController::addDetalle');

$routes->get('/historial', 'HistoryController::history');
$routes->get('/historial/getBitacoras', 'HistoryController::getBitacoras');
$routes->get('/historial/getOne/(:any)', 'HistoryController::getOne/$1');
$routes->get('/historial/getDetalle/(:any)', 'HistoryController::getDetalleById/$1');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
