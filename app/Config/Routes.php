<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 
$routes->get('/register','Auth::register');
$routes->get('/login','Auth::index');
$routes->get('/', 'Home::index');
$routes->post('auth/save', 'Auth::save');
$routes->post('auth/check', 'Auth::check');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('biletBul', 'Bilet::biletBul');

