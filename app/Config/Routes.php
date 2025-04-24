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