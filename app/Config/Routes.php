<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//URL e login yazıldığında LoginController altında index çalışsın
$routes->get('login', 'Login::index');
$routes->post('login/login_process', 'Login::login_process');
