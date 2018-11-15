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

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.in');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/',function(){
    return redirect('login');
});

/*
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
*/
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('admin.home');
     //Usuarios
    Route::resource('admin/usuarios', 'UserController', ['as' => 'admin'])->except([
        'show'
    ]);
    Route::get('admin/usuarios/data', array('as' => 'admin.usuarios.data', 'uses' => 'UserController@data'));

    //Materias
    Route::resource('admin/materias', 'MateriasController', ['as' => 'admin'])->except([
        'show'
    ]);
    Route::get('admin/materias/data', array('as' => 'admin.materias.data', 'uses' => 'MateriasController@data'));
    //proveedores
    Route::resource('admin/proveedores', 'ProveedoresController', ['as' => 'admin'])->except([
        'show'
    ]);
    Route::get('admin/proveedores/data', array('as' => 'admin.proveedores.data', 'uses' => 'ProveedoresController@data'));
    //clientes
    Route::resource('admin/clientes', 'ClientesController', ['as' => 'admin'])->except([
        'show'
    ]);
    Route::get('admin/clientes/data', array('as' => 'admin.clientes.data', 'uses' => 'ClientesController@data'));
    //Productos
    Route::resource('admin/productos', 'ProductosController', ['as' => 'admin'])->except([
        'show'
    ]);
    Route::get('admin/productos/data', array('as' => 'admin.productos.data', 'uses' => 'ProductosController@data'));
});
