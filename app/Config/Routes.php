<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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
    $routes->get('/', 'Login::index');
    $routes->get('/register', 'Register::index');
    $routes->post('/register', 'Register::create');
    $routes->post('/revisarTraduzir', 'RevisarTraduzir::index');
    $routes->get('/dashboard', 'Home::dashboard', ['filter' => 'auth']);
    $routes->post('/validLogin', 'Login::validLogin');
    $routes->get('/uploadResult/(:segment)', 'Upload::uploadResult/$1');
    $routes->get('/cancelUploadResult/(:segment)', 'Upload::cancelUploadResult/$1');
    $routes->get('/cancelUploadArquive/(:segment)', 'Upload::cancelUploadArquive/$1');
    $routes->get('/uploadArquive', 'Upload::uploadArquive');
    $routes->post('/uploadArquive', 'Upload::to_uploadArquive');
    $routes->get('/aprovar', 'Aprovar::index');
    $routes->get('/detalhesUserId/(:segment)', 'Aprovar::detalhesUser/$1');
    $routes->get('/aprovarUser/(:segment)', 'Aprovar::aprovarUser/$1');
    $routes->get('/reprovarUser/(:segment)', 'Aprovar::reprovarUser/$1');
    $routes->post('uploadResult', 'Upload::to_uploadResult');
    $routes->get('/uploadArquive', 'Upload::uploadArquive');
    $routes->post('/uploadArquive', 'Upload::to_uploadArquive');
    $routes->get('/success', 'Home::success');
    $routes->get('/logout', 'Login::logout');

    $routes->resource('submissoes', ['filter' => 'auth']);

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
