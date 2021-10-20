<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
// route login
$route['login'] = 'login';
// route dashboard
$route['dashboard'] = 'dashboard';

// route untuk halaman produk
$route['produk'] = 'produk';
$route['produk/(:num)'] = 'produk/$1';
$route['produk/detail_produk/(:any)'] = 'produk/detail_produk/$1';

// route untuk halaman produk
$route['artikel'] = 'artikel/index';
$route['artikel/(:num)'] = 'artikel/$1';
$route['artikel/(:any)'] = 'artikel/detail_artikel/$1';

// route untuk halaman kategori artikel
$route['kategori/(:any)'] = 'welcome/kategori/$1';
$route['kategori/(:any)/(:num)'] = 'welcome/kategori/$1/$s2';

//
$route['search'] = 'welcome/search';
$route['search/(:any)'] = 'welcome/search/$1';
$route['search/(:any)/(:num)'] = 'welcome/search/$1/$2';
//
$route['404_override'] = 'welcome/notfound';
$route['translate_uri_dashes'] = FALSE;
