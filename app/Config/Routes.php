<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setAutoRoute(true);

//$routes->get('/', 'Home::index');
$routes->addRedirect('/', 'home');
$routes->get('main_menu', 'MainMenu::index');
$routes->get('main_menu/add', 'MainMenu::create');
$routes->post('main_menu', 'MainMenu::store');
$routes->get('main_menu/edit/(:num)', 'MainMenu::edit/$1');
$routes->put('main_menu/(:any)', 'MainMenu::update/$1');
$routes->delete('main_menu/(:segment)', 'MainMenu::destroy/$1');




//make database
$routes->get('create-db', function() {
    $forge = \Config\Database::forge();
    if($forge->createDatabase('seminar_proposal')){
        echo 'Database created!';
    }
});
