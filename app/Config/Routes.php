<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setAutoRoute(true);

//$routes->get('login', 'Login::login');
$routes->get('/', 'Login::index');

//$routes->get('/', 'Home::index');
//$routes->addRedirect('/', 'home');

$routes->presenter('operator',['filter' => 'isLoggedIn']);
$routes->presenter('dosen',['filter' => 'isLoggedIn']);
$routes->presenter('user',['filter' => 'isLoggedIn']);
$routes->presenter('mahasiswa', ['filter' => 'isLoggedIn']);
$routes->presenter('ruangan',['filter' => 'isLoggedIn']);
$routes->presenter('dafsempro',['filter' => 'isLoggedIn']);

$routes->resource('sempro',['filter' => 'isLoggedIn']);


//make database
$routes->get('create-db', function() {
    $forge = \Config\Database::forge();
    if($forge->createDatabase('seminar_proposal')){
        echo 'Database created!';
    }
});
