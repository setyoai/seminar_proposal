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

$routes->presenter('password',['filter' => 'isLoggedIn']);
$routes->presenter('profile',['filter' => 'isLoggedIn']);
$routes->presenter('operator',['filter' => 'isLoggedIn']);
$routes->presenter('koordinator',['filter' => 'isLoggedIn']);
$routes->presenter('dosen',['filter' => 'isLoggedIn']);
$routes->presenter('user',['filter' => 'isLoggedIn']);

$routes->presenter('mahasiswa', ['filter' => 'isLoggedIn']);

$routes->presenter('dafskripsi',['filter' => 'isLoggedIn']);
$routes->presenter('dosbing',['filter' => 'isLoggedIn']);
$routes->resource('sempro',['filter' => 'isLoggedIn']);
$routes->presenter('dafsempro',['filter' => 'isLoggedIn']);
$routes->presenter('ruangan',['filter' => 'isLoggedIn']);
$routes->presenter('detsempro',['filter' => 'isLoggedIn']);



// Api Mahasiswa
$routes->get('mahasiswarest', 'MahasiswaRest::index');
$routes->get('mahasiswarest/(:num)', 'MahasiswaRest::show/$1');
$routes->post('mahasiswarest', 'MahasiswaRest::create');
$routes->put('mahasiswarest/(:num)', 'MahasiswaRest::update/$1');

//Api Daftar Skripsi
$routes->get('dafskripsirest', 'DafSkripsiRest::index');
$routes->get('dafskripsirest/(:num)', 'DafSkripsiRest::show/$1');
$routes->post('dafskripsirest', 'DafSkripsiRest::create');
$routes->put('dafskripsirest/(:num)', 'DafSkripsiRest::update/$1');

//Api Daftar Seminar
$routes->get('dafsemprorest', 'DafSemproRest::index');
$routes->get('dafsemprorest/(:num)', 'DafSemproRest::show/$1');
$routes->post('dafsemprorest', 'DafSemproRest::create');
$routes->put('dafsemprorest/(:num)', 'DafSemproRest::update/$1');

//Api User
$routes->get('userrest', 'UserRest::index');
$routes->get('userrest/(:num)', 'UserRest::show/$1');
$routes->post('userrest', 'UserRest::create');
$routes->put('userrest/(:num)', 'UserRest::update/$1');

//Api Penilain Sempro
$routes->get('detsemprorest', 'DetSemproRest::index');
$routes->get('detsemprorest/(:num)', 'DetSemproRest::show/$1');
$routes->post('detsemprorest', 'DetSemproRest::create');
$routes->put('detsemprorest/(:num)', 'DetSemproRest::update/$1');

//Api Dosbing Sempro
$routes->get('dosbingrest', 'DosbingRest::index');
$routes->get('dosbingrest/(:num)', 'DosbingRest::show/$1');
$routes->post('dosbingrest', 'DosbingRest::create');
$routes->put('dosbingrest/(:num)', 'DosbingRest::update/$1');

$routes->get('dosbingapi', 'DosbingApi::index');
$routes->get('dosbingapi/(:num)', 'DosbingApi::show/$1');
$routes->post('dosbingapi', 'DosbingApi::create');
$routes->put('dosbingapi/(:num)', 'DosbingApi::update/$1');

//Api Bimbingan
$routes->get('bimbinganrest', 'BimbinganRest::index');
$routes->get('bimbinganrest/(:num)', 'BimbinganRest::show/$1');
$routes->post('bimbinganrest', 'BimbinganRest::create');
$routes->put('bimbinganrest/(:num)', 'BimbinganRest::update/$1');

$routes->get('bimbingandosenrest', 'BimbinganDosenRest::index');
$routes->get('bimbingandosenrest/(:num)', 'BimbinganDosenRest::show/$1');
$routes->post('bimbingandosenrest', 'BimbinganDosenRest::create');
$routes->put('bimbingandosenrest/(:num)', 'BimbinganDosenRest::update/$1');


$routes->get('updatebimbingandosenrest/(:num)', 'UpdateBimbinganDosenRest::show/$1');
$routes->put('updatebimbingandosenrest/(:num)', 'UpdateBimbinganDosenRest::update/$1');

$routes->resource('judulrest');
$routes->resource('penilaianrest');



//make database
$routes->get('create-db', function() {
    $forge = \Config\Database::forge();
    if($forge->createDatabase('seminar_proposal')){
        echo 'Database created!';
    }
});
