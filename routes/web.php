<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    echo '<h1>modificado por jose vargas</h1>';
    return $router->app->version();
});
$router->get('estudiantes', 'EstudianteController@index');
$router->get('mostrarEstudiante/{codigo}', 'EstudianteController@show');
$router->post('nuevoEstudiante', 'EstudianteController@store');
$router->put('cambiarEstudiante/{codigo}', 'EstudianteController@update');
$router->delete('borrarEstudiante/{codigo}', 'EstudianteController@destroy');


$router -> get('actividades/{codigoEstudiante}', 'ActividadController@index');
$router -> get('mostrarActividades/{id}', 'ActividadController@show');
$router -> post('nuevActividades', 'ActividadController@store');
$router -> put('CambiActividades/{id}', 'ActividadController@update');
$router -> delete('borrActividades/{id}', 'ActividadController@destroy');

