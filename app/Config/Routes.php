<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
$routes->get('/auth/login', 'Auth::login');
$routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/processLogin', 'Auth::processLogin');
$routes->post('/auth/processRegister', 'Auth::processRegister');
$routes->get('/auth/logout', 'Auth::logout');

// Dashboard route (dengan filter auth)
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

$routes->group('products', ['filter' => 'auth'], function($routes) {
    $routes->get('', 'Products::index');
    $routes->get('create', 'Products::create');
    $routes->post('create', 'Products::create');
    $routes->get('edit/(:num)', 'Products::edit/$1');
    $routes->post('edit/(:num)', 'Products::edit/$1');
    $routes->post('delete/(:num)', 'Products::delete/$1');
    $routes->get('exportPdf', 'Products::exportPdf');
    $routes->get('exportExcel', 'Products::exportExcel');
});
