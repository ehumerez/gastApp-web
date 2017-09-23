<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('Instalacion')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    // MEDIDOR
    Route::get('medidores', 'MedidorController@index')->name('medidor/index');
    Route::get('medidor/crear', 'MedidorController@created')->name('medidor/crear');
    Route::post('medidor/store',['as' => 'medidor/store','uses' => 'MedidorController@store']);
    Route::get('medidor/editar/{id}', 'MedidorController@edit')->name('medidor/editar');
    Route::post('medidor/actualizar/{id}', 'MedidorController@update')->name('medidor/actualizar');

    // CLIENTE
    Route::get('cliente/index', 'ClienteController@index')->name('cliente/index');
    Route::get('clientes', 'ClienteController@index2')->name('clientes');
    Route::get('cliente/crear', 'ClienteController@crearCliente')->name('cliente/crear');
    Route::post('cliente/store', 'ClienteController@storeCliente')->name('cliente/store');

    // DOMICILIO CLIENTE
    Route::get('domicilios/{id}','DomicilioClienteController@index')->name('domicilios');
    Route::get('domicilios/crear/{id}','DomicilioClienteController@crear')->name('domicilios/crear');
    Route::post('domicilios/store/{id}','DomicilioClienteController@store')->name('domicilios/store');
    //Route::get('domicilio/ver-mapa/{id}','DomicilioClienteController@getLatLng');
    Route::post('domicilio/ver-mapa','DomicilioClienteController@getLatLng');

    // INSTALACIÓN
    Route::get('instalaciones','InstalacionController@index')->name('instalaciones');
    Route::get('instalacion/crear','InstalacionController@crear')->name('instalacion/crear');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*Route::post('/instalaciones/registrar-medidor', 'MedidorController@store')->name('/instalaciones/registrar-medidor');*/