<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

$admins = new \App\Models\Admin;
$admin = $admins->findAll();
// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/serviecs', 'ServiceController::index');
$routes->get('/locations/(:any)', 'LocationServicesController::index/$1');


// admins routes
$routes->get('/admin/', 'Admin/Admin::index', ['filter' => 'adminNoAuth']);
$routes->post('/admin/', 'Admin/Admin::login', ['filter' => 'adminNoAuth']);
$routes->post('/admin/logout', ' Admin/Admin::logout', ['filter' => 'adminAuth']);

$routes->get('/admin/staff', 'Staff::index', ['filter' => 'adminAuth']);
$routes->get('/admin/add/staff', 'Staff::add', ['filter' => 'adminAuth']);
$routes->post('/admin/add/staff', 'Staff::create', ['filter' => 'adminAuth']);
$routes->get('/admin/delete/staff/(:num)', 'Staff::delete/$1', ['filter' => 'adminAuth']);
$routes->get('/admin/edit/staff/(:num)', 'Staff::edit/$1', ['filter' => 'adminAuth']);
$routes->post('/admin/update/staff', 'Staff::update', ['filter' => 'adminAuth']);
$routes->get('/admin/notify', 'Admin/Admin::notify', ['filter' => 'adminAuth']);
$routes->get('/admin/total', 'Admin/Admin::total', ['filter' => 'adminAuth']);
$routes->post('/admin/updatenotify', 'Admin/Admin::updatenotify', ['filter' => 'adminAuth']);

$routes->get('/admin/dashboard', 'Dashboad::index', ['filter' => 'adminAuth']);




// category Routes
$routes->get('/admin/category', 'AdminCategory::index', ['filter' => 'adminAuth']);
$routes->get('/admin/category/add', 'AdminCategory::add', ['filter' => 'adminAuth']);
$routes->post('/admin/category/add', 'AdminCategory::createCategory', ['filter' => 'adminAuth']);
$routes->get('/admin/category/delete/(:num)', 'AdminCategory::delete/$1', ['filter' => 'adminAuth']);
$routes->get('/admin/category/edit/(:num)', 'AdminCategory::edit/$1', ['filter' => 'adminAuth']);
$routes->post('/admin/category/update/', 'AdminCategory::update', ['filter' => 'adminAuth']);

// location routes
$routes->get('/admin/location', 'AdminLocation::index', ['filter' => 'adminAuth']);
$routes->get('/admin/location/add', 'AdminLocation::add', ['filter' => 'adminAuth']);
$routes->post('/admin/location/add', 'AdminLocation::createLocation', ['filter' => 'adminAuth']);
$routes->get('/admin/location/delete/(:num)', 'AdminLocation::delete/$1', ['filter' => 'adminAuth']);
$routes->get('/admin/location/edit/(:num)', 'AdminLocation::edit/$1', ['filter' => 'adminAuth']);
$routes->post('/admin/location/update', 'AdminLocation::update', ['filter' => 'adminAuth']);


// serices routes
$routes->get('/admin/service', 'AdminService::index', ['filter' => 'adminAuth']);
$routes->get('/admin/service/add', 'AdminService::add', ['filter' => 'adminAuth']);
$routes->post('/admin/service/add', 'AdminService::create', ['filter' => 'adminAuth']);
$routes->get('/admin/service/delete/(:num)', 'AdminService::delete/$1', ['filter' => 'adminAuth']);
$routes->get('/admin/service/edit/(:num)', 'AdminService::edit/$1', ['filter' => 'adminAuth']);
$routes->post('/admin/service/update', 'AdminService::update', ['filter' => 'adminAuth']);

// packages Routes
$routes->get('/admin/packages', 'AdminPackages::index', ['filter' => 'adminAuth']);
$routes->get('/admin/packages/add', 'AdminPackages::add', ['filter' => 'adminAuth']);
$routes->post('/admin/packages/add', 'AdminPackages::create', ['filter' => 'adminAuth']);
$routes->get('/admin/packages/delete/(:num)', 'AdminPackages::delete/$1', ['filter' => 'adminAuth']);
$routes->get('/admin/packages/edit/(:num)', 'AdminPackages::edit/$1', ['filter' => 'adminAuth']);
$routes->post('/admin/update/packages', 'AdminPackages::update', ['filter' => 'adminAuth']);

// Banner Routes
$routes->get('/admin/banner', 'AdminBanner::index', ['filter' => 'adminAuth']);
$routes->get('/admin/banner/add', 'AdminBanner::add', ['filter' => 'adminAuth']);
$routes->post('/admin/banner/add', 'AdminBanner::create', ['filter' => 'adminAuth']);
$routes->get('/admin/delete/banner/(:num)', 'AdminBanner::delete/$1', ['filter' => 'adminAuth']);
$routes->get('/admin/edit/banner/(:num)', 'AdminBanner::edit/$1', ['filter' => 'adminAuth']);
$routes->put('/admin/banner/update', 'AdminBanner::update', ['filter' => 'adminAuth']);

// orders Routes
$routes->get('/admin/orders', 'Admin/AddToCart::index', ['filter' => 'adminAuth']);
$routes->get('/admin/assign/(:num)', 'AddToCart::assign/$1', ['filter' => 'adminAuth']);
$routes->put('/admin/assginorder', 'AddToCart::assignOder', ['filter' => 'adminAuth']);

// vendor routes
$routes->get('/vendor/approve-order', 'ApproveOrder::index', ['filter' => 'pAuth']);
$routes->get('/vendor/approve/(:num)', 'ApproveOrder::approve/$1', ['filter' => 'pAuth']);
$routes->post('/partners/register', 'Partner::register', ['filter' => 'pNoAuth']);
$routes->get('/partner', 'Partner::login', ['filter' => 'pNoAuth']);
$routes->post('/partner', 'Partner::loggedIn', ['filter' => 'pNoAuth']);
$routes->get('/vendor/orders', 'VendorOrder::index', ['filter' => 'pAuth']);
$routes->get('/vendor/approve/orders/(:num)', 'VendorOrder::approve/$1', ['filter' => 'pAuth']);
$routes->get('/vendor/reject/orders/(:num)', 'VendorOrder::reject/$1', ['filter' => 'pAuth']);
$routes->post('/vendor/view/orders', 'VendorOrder::view', ['filter' => 'pAuth']);
$routes->get('/vendor/dashboard', 'VendorDashboad::index', ['filter' => 'pAuth']);
$routes->get('/vendor/logout', 'Partner::logout', ['filter' => 'pAuth']);

// admins partners
$routes->get('/admin/partners', 'Admin\Partner::index', ['filter' => 'adminAuth']);
$routes->get('/admin/partners/active/(:num)', 'Admin\Partner::active/$1', ['filter' => 'adminAuth']);

// admin side user routes
$routes->get('/admin/users', 'AdminUser::index', ['filter' => 'adminAuth']);
$routes->get('/admin/delete/users/(:num)', 'AdminUser::delete/$1', ['filter' => 'adminAuth']);
$routes->get('/admin/edit/users/(:num)', 'AdminUser::edit/$1', ['filter' => 'adminAuth']);
$routes->post('/admin/update/users', 'AdminUser::update', ['filter' => 'adminAuth']);

// admin setting Routes
$routes->get('/admin/setting', 'Setting::index', ['filter' => 'adminAuth']);
$routes->post('/admin/setting', 'Setting::updateHeader', ['filter' => 'adminAuth']);
$routes->get('/admin/edit', 'Setting::editMenu', ['filter' => 'adminAuth']);
$routes->post('/admin/updatemenu', 'Setting::updateMenu', ['filter' => 'adminAuth']);
$routes->post('/admin/update', 'Setting::updateFooter', ['filter' => 'adminAuth']);

// admin role routes 
$routes->get('/admin/role', 'Role::index', ['filter' => 'adminAuth']);
$routes->get('/admin/add/role', 'Role::add', ['filter' => 'adminAuth']);
$routes->post('/admin/add/role', 'Role::createRole', ['filter' => 'adminAuth']);
$routes->get('/admin/delete/role/(:num)', 'Role::delete/$1', ['filter' => 'adminAuth']);
$routes->get('/admin/edit/role/(:num)', 'Role::edit/$1', ['filter' => 'adminAuth']);
$routes->post('/admin/update/role', 'Role::update', ['filter' => 'adminAuth']);


// users routes
$routes->post('/users/register', 'User/Auth/User::index');
$routes->post('/users/login', 'User/Auth/User::login');
$routes->get('/users/logout', 'User/Auth/User::logout', ['filter' => 'userAuth']);
$routes->get('/users/carts', 'User/Auth/User::cart', ['filter' => 'userAuth']);
$routes->put('/users/carts/(:num)', '\App\Controllers\User\Auth\User::update/$1', ['filter' => 'userAuth']);
$routes->get('/users/delete/(:num)', '\App\Controllers\User\Auth\User::delete/$1', ['filter' => 'userAuth']);
$routes->get('/users/deletecart', '\App\Controllers\User\Auth\User::deletecart', ['filter' => 'userAuth']);
$routes->get('/users/edit/profile', '\App\Controllers\User\Auth\User::edit', ['filter' => 'userAuth']);
$routes->post('/users/edit/profile', '\App\Controllers\User\Auth\User::updates', ['filter' => 'userAuth']);
$routes->get('/users/notify', '\App\Controllers\User\Auth\User::notify', ['filter' => 'userAuth']);
$routes->get('/users/total', '\App\Controllers\User\Auth\User::total', ['filter' => 'userAuth']);
$routes->post('/users/updatenotify', '\App\Controllers\User\Auth\User::updatenotify', ['filter' => 'userAuth']);

$routes->get('/services/packages/(:num)', 'Package::index/$1');
$routes->post('/services/packages/(:num)', 'Package::rating/$1');
$routes->get('/addtocart/(:num)/services/(:num)', 'Package::addToCart/$1/$2');

$routes->get('/users/proceed/order', 'User\Auth\User::proceed', ['filter' => 'userAuth']);
$routes->post('/users/proceed/order', 'User\Auth\User::order', ['filter' => 'userAuth']);

$routes->get('/users/my-order', 'Order::index', ['filter' => 'userAuth']);


$routes->get('/thankyou', 'thankyou::index', ['filter' => 'userAuth']);


$routes->get('/categorys/services/(:num)', 'Home::services/$1');





/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
