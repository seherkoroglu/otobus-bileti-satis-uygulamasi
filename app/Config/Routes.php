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
$routes->post('bilet/biletBul', 'Bilet::biletBul');
$routes->get('bilet/biletBul', 'Bilet::biletBul');
$routes->post('searchController/search', 'SearchController::search');
$routes->get('/search', 'SearchController::search');
$routes->get('/searchResults', 'SearchController::search');
$routes->post('bilet/biletAra', 'Bilet::biletAra');
$routes->get('/biletAra', 'Bilet::biletAra');
$routes->get('seatController/index', 'SeatController::index');
$routes->post('seatController/showBusSeats', 'SeatController::showBusSeats');
$routes->get('/biletBul', 'SeatController::showBusSeats');
$routes->post('bilet/check', 'Bilet::check');
$routes->get('bilet/biletAra', 'Bilet::check');
$routes->post('bilet/showMap', 'Bilet::showMap');
$routes->post('seatController/showBusSeats', 'SeatController::showBusSeats');
$routes->post('seatController/reserveSeats', 'SeatController::reserveSeats');
$routes->post('seatController/buySeats', 'SeatController::buySeats');
$routes->get('seatController/reserveSeats', 'SeatController::reserveSeats');
$routes->get('seatController/buySeats', 'SeatController::buySeats');
$routes->get('odeme', 'OdemeController::index');
$routes->post('odeme', 'OdemeController::index');
$routes->post('odemeController/index', 'OdemeController::index');
$routes->get('cart', 'OdemeController::cart');
$routes->post('cart', 'OdemeController::cart');
$routes->get('payment', 'OdemeController::payment');
$routes->post('cart', 'SeatController::reserveSeats');













