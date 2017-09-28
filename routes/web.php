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
    Route::get('medidor/actualizar-consumo/{id}', 'MedidorController@setConsumo')->name('medidor/actualizar-consumo');
    //Route::delete('medidor/actualizar-consumo/{id}', 'MedidorController@setConsumo')->name('medidor/actualizar-consumo');

    // CLIENTE
    Route::get('cliente/index', 'ClienteController@index')->name('cliente/index');
    Route::get('clientes', 'ClienteController@index2')->name('clientes');
    Route::get('cliente/crear', 'ClienteController@crearCliente')->name('cliente/crear');
    Route::post('cliente/store', 'ClienteController@storeCliente')->name('cliente/store');
    Route::get('cliente/editar/{ci}', 'ClienteController@editar')->name('cliente/editar');
    Route::post('cliente/update/{ci}', 'ClienteController@update')->name('cliente/update');

    // DOMICILIO CLIENTE
    Route::get('domicilios/{id}','DomicilioClienteController@index')->name('domicilios');
    Route::get('domicilios/crear/{id}','DomicilioClienteController@crear')->name('domicilios/crear');
    Route::post('domicilios/store/{id}','DomicilioClienteController@store')->name('domicilios/store');
    //Route::get('domicilio/ver-mapa/{id}','DomicilioClienteController@getLatLng');
    Route::post('domicilio/ver-mapa','DomicilioClienteController@getLatLng');
    Route::post('domicilio/delete/{ci}/{id}','DomicilioClienteController@destroy')->name('domicilio/delete');

    Route::get('domicilios/cliente/{ci}','DomicilioClienteController@getDomicilios')->name('domicilios/cliente');

    // INSTALACIÓN
    Route::get('instalaciones','InstalacionController@index')->name('instalaciones');
    Route::get('instalacion/crear','InstalacionController@crear')->name('instalacion/crear');
    Route::post('instalacion/store','InstalacionController@store')->name('instalacion/store');
    Route::get('instalacion/mostrar/{id}','InstalacionController@show')->name('instalacion/mostrar');
    Route::get('instalacion/editar/{id}','InstalacionController@edit')->name('instalacion/editar');
    // INSTALACIÓN WEBSERVICES
    Route::get('instalacion/aviso/{id}/{consumo}','InstalacionController@aviso')->name('avisos');
});

Route::namespace('Empleados')->group(function () {

    // LECTURADOR
    Route::get('lecturador/index', 'LecturadorController@index')->name('lecturador/index');
    Route::get('lecturadores', 'LecturadorController@index2')->name('lecturadores');
    Route::get('lecturador/crear', 'LecturadorController@crearLecturador')->name('lecturador/crear');
    Route::post('lecturador/store', 'LecturadorController@storeLecturador')->name('lecturador/store');
    Route::get('lecturador/editar/{ci}', 'LecturadorController@editar')->name('lecturador/editar');
    Route::post('lecturador/update/{ci}', 'LecturadorController@update')->name('lecturador/update');
    Route::get('lecturador/eliminar/{ci}', 'LecturadorController@eliminar')->name('lecturador/eliminar');
    Route::get('lecturador/recorridos/{ci}', 'LecturadorController@recorridos')->name('lecturador/recorridos');

    // TÉCNICO
    Route::get('tecnico/index', 'TecnicoController@index')->name('tecnico/index');
    Route::get('tecnicos', 'TecnicoController@index2')->name('tecnicos');
    Route::get('tecnico/crear', 'TecnicoController@crearTecnico')->name('tecnico/crear');
    Route::post('tecnico/store', 'TecnicoController@storeTecnico')->name('tecnico/store');
    Route::get('tecnico/editar/{ci}', 'TecnicoController@editar')->name('tecnico/editar');
    Route::post('tecnico/update/{ci}', 'TecnicoController@update')->name('tecnico/update');
});

Route::namespace('Cobranza')->group(function () {

    // RECORRIDOS
    Route::get('recorridos', 'RecorridoController@index')->name('recorridos');
    Route::get('recorrido/crear', 'RecorridoController@crear')->name('recorrido/crear');
    Route::post('recorrido/store', 'RecorridoController@store')->name('recorrido/store');
    Route::get('recorrido/asignar-lecturador/{id}', 'RecorridoController@asignarLecturador')->name('recorrido/asignar-lecturador');
    Route::post('recorrido/store-asignacion/{id}', 'RecorridoController@crearAsignacionLecturador')->name('recorrido/store-asignacion');
    Route::get('recorrido/mostrar/{ic}/{id}', 'RecorridoController@showRecorrido')->name('recorrido/mostrar');
});


//Route::get('domicilio/delete/{id}','DomicilioClienteController@destroy')->name('domicilio/delete/');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*Route::post('/instalaciones/registrar-medidor', 'MedidorController@store')->name('/instalaciones/registrar-medidor');*/