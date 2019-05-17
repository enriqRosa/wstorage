<?php

/*
|--------------------------------------------------------------------------
| Web Routes WStorage
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

# RUTA LOGIN DEL SISTA # 
Route::get('/', 'LoginController@index')->name('index');
Route::post('login', 'Auth\LoginController@login');

# RUTA LOGOUT DEL SISTEMA #
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

# WIZARD REGISTRAR EMPRESA, LICENCIA, CONTACTO Y ADMINISTRADOR
Route::get('add-company-first', 'LoginController@addCompany')->name('addCompany');
Route::post('add-company-first', 'LoginController@addCompanyPost')->name('addCompanyPost');

# RUTA CREADA POR LARAVEL PARA EL FUNCIONAMIENTO DE LOGIN NOTA: NO BORRAR #
Auth::routes();

# APARTIR DE ESTA RUTA EL USUARIO YA TIENE INICIADA UNA SESSION #
# RUTA ESTABLECIDA POR LARAVEL NOTA NO BORRAR A MENOS QUE SE MODIFIQUE  #
Route::get('/home', 'HomeController@index')->name('home');
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
Route::get('add-user/{company_id}','UsersController@createUser')->name('createUser');
Route::post('add-user','UsersController@createUserPost')->name('createUserPost');
//RUTA PARA VISTA EDITAR USUARIO
Route::get('edit-user/{id}','UsersController@updateUser')->name('updateUser');
Route::post('edit-user/{id}','UsersController@updateUserPost')->name('updateUserPost');
//RUTA PARA VER TODOS LOS USUARIOS
Route::get('users/{id}','UsersController@showUsers')->name('users');

/****************************CATALOGO DE USUARIOS**********************/
//RUTA PARA VISTA AGREGAR USUARIO CATALOGO
Route::get('user-catalog','UsersCatalogController@UserCatalog');
Route::post('add-user-catalog','UsersCatalogController@storeUserCatalog')->name('storeUserCatalog');
//RUTA PARA ELIMINAR
Route::get('user-catalog/{id}/destroy',[
    'uses' => 'UsersCatalogController@destroyUserCatalog',
    'as'   => 'catalog-user-destroy'
]);
/****************************LICENCIA**********************************/
//RUTA PARA VISTA AGREGAR LICENCIA
Route::get('add-license','LicenseController@createLicense');
//RUTA PARA VISTA EDITAR LICENCIA
Route::get('edit-license/{id}/edit',[
    'uses' => 'LicenseController@editLicense',
    'as'   =>  'edit-license'
]);
//RUTA PARA ACTULIZAR LICENCIA
Route::put('update-license/{id}/update',[
    'uses' => 'LicenseController@updateLicense',
    'as'   => 'updateLicense'
]);
//RUTA PARA ELIMINAR LICENCIA
Route::get('license/{id}/destroy',[
    'uses' => 'LicenseController@destroyLicense',
    'as'   => 'license-destroy'
]);
//RUTA PARA VER EL ESTATUS DE LA LICENCIA O LICENCIAS

Route::get('license-status','LicenseController@showLicenses');
Route::get('license-status-company/{license_id}/show','LicenseController@showLicenseCompany')->name('showLicenseCompany');

/****************************CONTACTOS*********************************/
//RUTA PARA AGREGAR UN CONTACTO
Route::get('add-contact/{company_id}','ContactsController@storeContact')->name('storeContact');
Route::post('add-contact','ContactsController@storeContactPost')->name('create-contact');
//RUTA PARA LISTAR TODOS LOS CONTACTOS
Route::get('contacts/{company_id}','ContactsController@showContacts')->name('showContacts');
//RUTA PARA EDITAR EL CONTACTO
Route::get('edit-contact','ContactsController@updateContact');
//RUTA PARA ELIMINAR UN CONTACTO
ROute::get('contact/{id}/destroy','ContactsController@destroyContact')->name('contact-destroy');
/****************************DICCIONARIO*******************************/
//RUTA PARA AGREGAR UNA EXTENSIÓN
Route::get('dictionary','DictionaryController@Dictionary');
Route::post('add-dictionary','DictionaryController@storeDictionary')->name('storeDictionary');
//RUTA PARA ELIMINAR 
Route::get('dictionary/{id}/destroy',[
    'uses' => 'DictionaryController@destroyDictionary',
    'as'   => 'dictionary-destroy'
]);

/****************************ARCHIVOS*******************************/
//RUTA PARA CARGAR ARCHIVOS
Route::get('files','FileController@showFiles')->name('showFiles');
Route::get('files/{company_id}','FileController@showFilesFolder')->name('showFilesFolder');
//Route::get('archivos','FileController@showFiles');
#Route::post('archivos','FileController@uploadFiles')->name('uploadFiles');
Route::resource('archivos', 'FileController');
//Route::post('archivos', 'FileController@cargar')->name('cargar');