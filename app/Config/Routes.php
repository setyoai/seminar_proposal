<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//$routes->addRedirect('/', 'home');
$routes->get('main_menu', 'MainMenu::index');
$routes->get('main_menu/add', 'MainMenu::create');
$routes->post('main_menu', 'MainMenu::store');


//make database
$routes->get('create-db', function() {
    $forge = \Config\Database::forge();
    if($forge->createDatabase('seminar_proposal')){
        echo 'Database created!';
    }
});
