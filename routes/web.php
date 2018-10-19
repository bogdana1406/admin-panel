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

Auth::routes();
Route::get('/admin', 'AdminController@login');


Route::get('/home', 'HomeController@index')->name('home');

Route::match(['get', 'post'], '/admin', 'AdminController@login');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/admin/dashboard', 'AdminController@dashboard');
    Route::get('/admin/settings', 'AdminController@settings');
    Route::get('/admin/check-pwd', 'AdminController@checkPassword');
    Route::match(['get', 'post'], '/admin/update-pwd', 'AdminController@updatePassword');


    // categories Route (Admin)
    Route::match(['get', 'post'], '/admin/add-category', 'CategoryController@addCategory');
    Route::match(['get', 'post'], '/admin/edit-category/{id}', 'CategoryController@editCategory');
    Route::match(['get', 'post'], '/admin/delete-category/{id}', 'CategoryController@deleteCategory');
    Route::get('/admin/view-categories', 'CategoryController@viewCategories');

    //brands Route (Admin)

    Route::get('/admin/add-brand', 'BrandController@showAddBrand');
    Route::post('/admin/add-brand', 'BrandController@addBrand');
    Route::get('/admin/edit-brand/{id}', 'BrandController@showEditBrand');
    Route::post('/admin/edit-brand/{id}', 'BrandController@editBrand');
    Route::match(['get', 'post'], '/admin/delete-brand/{id}', 'BrandController@deleteBrand');
    Route::get('/admin/view-brands', 'BrandController@viewBrands');

    //engines Route (Admin)

    Route::get('/admin/add-engine', 'EngineController@showAddEngine');
    Route::post('/admin/add-engine', 'EngineController@addEngine');
    Route::get('/admin/edit-engine/{id}', 'EngineController@showEditEngine');
    Route::post('/admin/edit-engine/{id}', 'EngineController@editEngine');
    Route::match(['get', 'post'], '/admin/delete-engine/{id}', 'EngineController@deleteEngine');
    Route::get('/admin/view-engines', 'EngineController@viewEngines');


    //cars Route (Admin)

    Route::post('/admin/add-car', 'CarController@addCar');
    Route::get('/admin/add-car', 'CarController@showAddCar');


    //products Route (Admin)
    Route::match(['get', 'post'], '/admin/add-product', 'ProductsController@addProduct');



});



Route::get('/logout', 'AdminController@logout');