<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'CarouselController::index');
$routes->group('carousel', function ($routes) {
    $routes->get('/', 'CarouselController::index');
    $routes->get('login', 'CarouselController::index');
    $routes->post('login', 'CarouselController::login');
    $routes->get('logout', 'CarouselController::logout');
    $routes->get('dashboard', 'CarouselController::index');
});
