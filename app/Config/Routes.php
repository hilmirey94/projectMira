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
$routes->setDefaultController('DashboardController');
$routes->setDefaultMethod('dashboard');
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
$routes->get('/', 'SigninController::index');
$routes->get('/signup', 'SignupController::index');
$routes->get('/signin', 'SigninController::index');
$routes->get('/home', 'HomeController::index',['filter' => 'authGuard']);
$routes->get('/report', 'ReportController::index',['filter' => 'authGuard']);
$routes->get('/logs', 'LogsController::index',['filter' => 'authGuard']);
$routes->get('/logs/delete/(:num)', 'LogsController::delete/$1',['filter' => 'authGuard']);
$routes->get('/manage-report', 'ManageReportController::index',['filter' => 'authGuard']);
$routes->get('/manage-report/create', 'ManageReportController::create',['filter' => 'authGuard']);
$routes->post('/manage-report/store', 'ManageReportController::store',['filter' => 'authGuard']);
$routes->get('/manage-report/edit/(:num)', 'ManageReportController::singleReport/$1',['filter' => 'authGuard']);
$routes->post('/manage-report/update', 'ManageReportController::update',['filter' => 'authGuard']);
$routes->get('/manage-report/delete/(:num)', 'ManageReportController::delete/$1',['filter' => 'authGuard']);
$routes->get('/manage-user', 'ManageUserController::index',['filter' => 'authGuard']);
$routes->get('/manage-user/create', 'ManageUserController::create',['filter' => 'authGuard']);
$routes->post('/manage-user/store', 'ManageUserController::store',['filter' => 'authGuard']);
$routes->get('/manage-user/edit/(:num)', 'ManageUserController::singleReport/$1',['filter' => 'authGuard']);
$routes->post('/manage-user/update', 'ManageUserController::update',['filter' => 'authGuard']);
$routes->get('/manage-user/delete/(:num)', 'ManageUserController::delete/$1',['filter' => 'authGuard']);

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
