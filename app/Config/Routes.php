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

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
//CRUD Carreras
$routes->get('/Carreras/index', 'Home::Carreras');
$routes->get('/borrarCarrera/(:num)', 'Home::borrarCarrera/$1');
$routes->get('/Carreras/crear', 'Home::crearCarreras');
$routes->post('/carreras/registrar', 'Home::registrar');// Procesar la infomacion del formulario
$routes->get('/carreras/editar/(:num)', 'CarreraController::editar/$1');
$routes->post('/carrera/actualizar/(:num)', 'CarreraController::actualizar/$1');

//CRUD Estudiantes
$routes->get('/Estudiantes/index', 'Home::Estudiantes');
$routes->get('/borrarEstudiante/(:num)', 'Home::borrarEstudiante/$1');
$routes->get('/Estudiantes/crear', 'Home::crearEstudiantes');
$routes->post('/estudiante/registrar', 'Home::registrarEstudiante');// Procesar la infomacion del formulario
$routes->get('/estudiantes/editar/(:num)', 'EstudianteController::editar/$1');
$routes->post('/estudiantes/actualizar/(:num)', 'EstudianteController::actualizar/$1');

//CRUD Especialidad
$routes->get('/Especialidad/index', 'Home::Especialidad');
$routes->get('/borrarEspecialidad/(:num)', 'Home::borrarEspecialidad/$1');
$routes->get('/Especialidad/crear', 'Home::crearEspecialidad');
$routes->post('/especialidad/registrar', 'Home::registrarEspecialidad');// Procesar la infomacion del formulario
$routes->get('/especialidad/editar/(:num)', 'EspecialidadController::editar/$1');
$routes->post('/especialidad/actualizar/(:num)', 'EspecialidadController::actualizar/$1');

//Todas las vistas
$routes->get('/vistas/(:any)', 'Home::view/$1');

$routes->post('api/readEmpleados', 'ApiController::readEmpleados');
$routes->post('api/ejemplo', 'ApiController::ejemplo');

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
