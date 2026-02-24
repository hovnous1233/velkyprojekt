<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::index');
$routes->get("komponenty/(:num)", "Main::komponenty/$1");
$routes->get("typkomponentu/(:num)", "Main::typkomponentu/$1");