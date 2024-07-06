<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->post('/', 'Auth::index');

/**
 * Dashboard Controller routes used as view in 'dashboard/home'route
 */
// $routes->get('dashboard/home', 'Dashboard::home');
// $routes->get('dashboard/home?s=work in progress', 'Dashboard::workinprogress');
// $routes->get('dashboard/completedprs', 'Dashboard::completedprs');
// $routes->get('dashboard/wishlistprs', 'Dashboard::wishlistprs');
// $routes->get('dashboard/test1', 'Dashboard::test1');

/**
 * This remove the repo
 */
$routes->match(['get', 'post'], 'dashboard/remove_repo/(:repo_id)', 'Dashboard::remove_repo/$1');
