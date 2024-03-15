<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
//URL e login yazıldığında LoginController altında index çalışsın
$routes->get('login', 'LoginController::index');
$routes->post('login/login_process', 'LoginController::login_process');
$routes->post('journeys', 'JourneysController::index');
