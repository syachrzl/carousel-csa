<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'CarouselController::login_otp');
$routes->group('carousel', function ($routes) {
    // $routes->get('/', 'CarouselController::index');
    // $routes->get('login', 'CarouselController::index');
    // $routes->post('login', 'CarouselController::login');
    $routes->get('logout', 'CarouselController::logout');
    $routes->get('dashboard', 'CarouselController::index');

    $routes->group('otp', function ($routes) {
        $routes->get('/', 'CarouselController::login_otp');
        $routes->post('send', 'CarouselController::sendOtp');
        $routes->get('verify', 'CarouselController::verifyOtpForm');
        $routes->post('verify', 'CarouselController::verifyOtp');
    });
});
