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

Route::get('/', 'LoginController@index');
// Route::get('/',function(){
//     $companies=App\Company::findOrFail(1);
//     return $companies->contacts;
// });

//RUTA PARA VISTA SUPERUSER.BLADE.PHP
Route::get('spusr','LoginController@superuser');

/****************************EMPRESA***********************************/
//RUTA PARA VISTA AGREGAR EMPRESA
Route::get('add-company','CompanyController@createCompany');
//RUTA PARA VISTA LISTAR TODAS LAS EMPRESAS
Route::get('companies','CompanyController@showCompanies');
//RUTA PARA VISTA EDITAR EMPRESA
Route::get('edit-company','CompanyController@updateCompany');

/****************************USUARIOS**********************************/
//RUTA PARA VISTA AGREGAR USUARIO
Route::get('add-user','UsersController@createUser');
//RUTA PARA VISTA EDITAR USUARIO
Route::get('edit-user','UsersController@updateUser');
//RUTA PARA VER TODOS LOS USUARIOS
Route::get('users','UsersController@showUsers');
//RUTA PARA VISTA AGREGAR USUARIO CATALOGO
Route::get('user-catalog','UsersController@addUserCatalog');

/****************************LICENCIA**********************************/
//RUTA PARA VISTA AGREGAR LICENCIA
Route::get('add-license','LicenseController@createLicense');
//RUTA PARA VISTA EDITAR LICENCIA
Route::get('edit-license','LicenseController@updateLicense');
//RUTA PARA VER EL ESTATUS DE LA LICENCIA O LICENCIAS
Route::get('license-status','LicenseController@showLicenses');

/****************************CONTACTOS*********************************/
//RUTA PARA AGREGAR UN CONTACTO
Route::get('add-contact','ContactsController@createContact');
//RUTA PARA LISTAR TODOS LOS CONTACTOS
Route::get('contacts','ContactsController@showContacts');
//RUTA PARA EDITAR EL CONTACTO
Route::get('edit-contact','ContactsController@updateContact');

/****************************DICCIONARIO*******************************/
//RUTA PARA AGREGAR UNA EXTENSIÓN
Route::get('dictionary','DictionaryController@createDictionary');



