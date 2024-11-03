<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'User::index');

// AJUAN ROUTES
$routes->get('/project/data', 'Ajuan::ajuan');
$routes->get('/project/new-project', 'Ajuan::newAjuan');
$routes->post('/project/create', 'Ajuan::createAjuan');
$routes->get('/project/validate/(:num)', 'Ajuan::viewValidateAjuan/$1', ['filter' => 'role:admin']);
$routes->post('/project/validate/(:num)', 'Ajuan::validateAjuan/$1', ['filter' => 'role:admin']);
$routes->get('/project/edit/(:num)', 'Ajuan::editAjuan/$1');
$routes->post('/project/update/(:num)', 'Ajuan::updateAjuan/$1');
$routes->get('/project/view/(:num)', 'Ajuan::viewAjuan/$1');
$routes->get('/project/delete/(:num)', 'Ajuan::deleteAjuan/$1', ['filter' => 'role:admin']);
$routes->get('/project/pengembangan/export-pdf', 'Ajuan::exportPDF', ['filter' => 'role:admin']);

// PEMBUATAN ROUTES
$routes->get('/project/list-pembuatan', 'PembuatanAplikasi::ajuan');
$routes->get('/project/new-pembuatan', 'PembuatanAplikasi::newAjuan');
$routes->post('/project/create-pembuatan', 'PembuatanAplikasi::createAjuan');
$routes->get('/project/validate-pembuatan/(:num)', 'PembuatanAplikasi::viewValidateAjuan/$1', ['filter' => 'role:admin']);
$routes->post('/project/validate-pembuatan/(:num)', 'PembuatanAplikasi::validateAjuan/$1', ['filter' => 'role:admin']);
$routes->get('/project/edit-pembuatan/(:num)', 'PembuatanAplikasi::editAjuan/$1');
$routes->post('/project/update-pembuatan/(:num)', 'PembuatanAplikasi::updateAjuan/$1');
$routes->get('/project/view-pembuatan/(:num)', 'PembuatanAplikasi::viewAjuan/$1');
$routes->get('/project/delete-pembuatan/(:num)', 'PembuatanAplikasi::deleteAjuan/$1', ['filter' => 'role:admin']);
$routes->get('/project/pembuatan/export-pdf', 'PembuatanAplikasi::exportPDF', ['filter' => 'role:admin']);

// USER ROUTES
$routes->add('/admin/user/list', 'User::list', ['filter' => 'role:admin']);
$routes->add('/admin/user/edit/(:num)', 'User::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/user/update/(:num)', 'User::update/$1', ['filter' => 'role:admin']);
$routes->get('/admin/user/new-user', 'User::new', ['filter' => 'role:admin']);
$routes->post('/admin/user/create', 'User::create', ['filter' => 'role:admin']);
$routes->get('/admin/delete/(:num)', 'User::delete/$1', ['filter' => 'role:admin']);

// MENUS
// Bagian
$routes->get('/admin/menus/bagian', 'Bagian::bagian', ['filter' => 'role:admin']);
$routes->get('/admin/menus/new-bagian', 'Bagian::formBagian', ['filter' => 'role:admin']);
$routes->post('/admin/menus/bagian/create', 'Bagian::newBagian', ['filter' => 'role:admin']);
$routes->get('/admin/menus/bagian/edit/(:num)', 'Bagian::formEditBagian/$1', ['filter' => 'role:admin']);
$routes->post('/admin/menus/bagian/update/(:num)', 'Bagian::updateBagian/$1', ['filter' => 'role:admin']);
$routes->get('/admin/menus/bagian/delete/(:num)', 'Bagian::deleteBagian/$1', ['filter' => 'role:admin']);

// Jenis App
$routes->get('/admin/menus/jenis', 'JenisApp::jenisApp', ['filter' => 'role:admin']);
$routes->get('/admin/menus/new-jenis', 'JenisApp::formJenisApp', ['filter' => 'role:admin']);
$routes->post('/admin/menus/jenis/create', 'JenisApp::newJenisApp', ['filter' => 'role:admin']);
$routes->get('/admin/menus/jenis/edit/(:num)', 'JenisApp::formEditJenisApp/$1', ['filter' => 'role:admin']);
$routes->post('/admin/menus/jenis/update/(:num)', 'JenisApp::updateJenisApp/$1', ['filter' => 'role:admin']);
$routes->get('/admin/menus/jenis/delete/(:num)', 'JenisApp::deleteJenisApp/$1', ['filter' => 'role:admin']);

// Fakultas
$routes->get('/admin/menus/fakultas', 'Fakultas::fakultas', ['filter' => 'role:admin']);
$routes->get('/admin/menus/new-fakultas', 'Fakultas::formFakultas', ['filter' => 'role:admin']);
$routes->post('/admin/menus/fakultas/create', 'Fakultas::newFakultas', ['filter' => 'role:admin']);
$routes->get('/admin/menus/fakultas/edit/(:num)', 'Fakultas::formEditFakultas/$1', ['filter' => 'role:admin']);
$routes->post('/admin/menus/fakultas/update/(:num)', 'Fakultas::updateFakultas/$1', ['filter' => 'role:admin']);
$routes->get('/admin/menus/fakultas/delete/(:num)', 'Fakultas::deleteFakultas/$1', ['filter' => 'role:admin']);

// Prodi
$routes->get('/admin/menus/prodi', 'Prodi::prodi', ['filter' => 'role:admin']);
$routes->get('/admin/menus/new-prodi', 'Prodi::formProdi', ['filter' => 'role:admin']);
$routes->post('/admin/menus/prodi/create', 'Prodi::newProdi', ['filter' => 'role:admin']);
$routes->get('/admin/menus/prodi/edit/(:num)', 'Prodi::formEditProdi/$1', ['filter' => 'role:admin']);
$routes->post('/admin/menus/prodi/update/(:num)', 'Prodi::updateProdi/$1', ['filter' => 'role:admin']);
$routes->get('/admin/menus/prodi/delete/(:num)', 'Prodi::deleteProdi/$1', ['filter' => 'role:admin']);

// Tim IT
$routes->get('/admin/menus/tim', 'TimIt::timIt', ['filter' => 'role:admin']);
$routes->get('/admin/menus/new-tim', 'TimIt::formTimIt', ['filter' => 'role:admin']);
$routes->post('/admin/menus/tim/create', 'TimIt::newTimIt', ['filter' => 'role:admin']);
$routes->get('/admin/menus/tim/edit/(:num)', 'TimIt::formEditTimIt/$1', ['filter' => 'role:admin']);
$routes->post('/admin/menus/tim/update/(:num)', 'TimIt::updateTimIt/$1', ['filter' => 'role:admin']);
$routes->get('/admin/menus/tim/delete/(:num)', 'TimIt::deleteTimIt/$1', ['filter' => 'role:admin']);

// My Profile
$routes->get('/profile/edit', 'Profile::edit');
$routes->post('/profile/update', 'Profile::update');

$routes->get('/error', 'Error::index');
