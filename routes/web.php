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
    Route::get('/admin/edit-car/{id}', 'CarController@showEditCar');
    Route::post('/admin/edit-car/{id}', 'CarController@editCar');
    Route::get('/admin/view-cars', 'CarController@viewCars');
    Route::get('/admin/delete-car-image/{id}', 'CarController@deleteCarImage');
    //Route::match(['get', 'post'], '/admin/delete-car/{id}', 'CarController@deleteCar');
    Route::get('/admin/delete-car/{id}', 'CarController@deleteCar');


    //Images upload Route
    Route::get('/admin/upload-car-images/{id}', 'CarsImageController@uploadForm');
    Route::post('/admin/upload-car-images/{id}', 'CarsImageController@uploadSubmit');


    Route::get('/admin/upload-car-images-form', 'CarsImageController@uploadImagesForm');
    Route::post('/admin/upload-car-images-form', 'CarsImageController@uploadFormSubmit');


    Route::get('/admin/view-images-table', 'CarsImageController@showImagesTable');
    Route::get('/admin/delete-car-image-record/{id}', 'CarsImageController@deleteCarsImageRecord');






});



Route::get('/logout', 'AdminController@logout');