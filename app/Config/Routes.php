<?php

use App\Controllers\AuthController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::login');
$routes->get('/post', 'PostController::index');
$routes->get('/tambahpost', 'PostController::tambah');
$routes->get('/detail/(:num)', 'PostController::detail/$1');
$routes->get('/edit/(:num)', 'PostController::edit/$1');


$routes->post('/aksi_login', 'AuthController::auth');
$routes->post('/aksi_tambah_post', 'PostController::aksi_tambah');
$routes->post('/logout', 'AuthController::logout');
