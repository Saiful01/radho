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
    return view('common.home.index');
});


Route::get('/login', 'LoginController@login');
Route::post('/login/check', 'LoginController@loginCheck');


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/dashboard', 'DashboardController@dashboard');

    // Admin Category section
    Route::get('/category/create', 'CategoryController@create');
    Route::post('/category/store', 'CategoryController@store');
    Route::get('/category/view', 'CategoryController@show');
    Route::get('/category/edit/{id}', 'CategoryController@edit');
    Route::post('/category/update', 'CategoryController@update');
    Route::get('/category/delete/{id}', 'CategoryController@destroy');

    // Admin Sub_Category section
    Route::get('/subcategory/create', 'SubCategoryController@create');
    Route::post('/subcategory/store', 'SubCategoryController@store');
    Route::get('/subcategory/view', 'SubCategoryController@show');
    Route::get('/subcategory/edit/{id}', 'SubCategoryController@edit');
    Route::post('/subcategory/update', 'SubCategoryController@update');
    Route::get('/subcategory/delete/{id}', 'SubCategoryController@destroy');


    // Admin Recipe section
    Route::get('/recipe/create', 'RecipeController@create');
    Route::post('/recipe/store', 'RecipeController@store');
    Route::get('/recipe/view', 'RecipeController@show');
    Route::get('/recipe/edit/{id}', 'RecipeController@edit');
    Route::post('/recipe/update', 'RecipeController@update');
    Route::get('/recipe/delete/{id}', 'RecipeController@destroy');

    

    // Admin Ingredient section
    Route::get('/ingredient/create', 'IngredientController@create');
    Route::post('/ingredient/store', 'IngredientController@store');
    Route::get('/ingredient/view', 'IngredientController@show');
    Route::get('/ingredient/edit/{id}', 'IngredientController@edit');
    Route::post('/ingredient/update', 'IngredientController@update');
    Route::get('/ingredient/delete/{id}', 'IngredientController@destroy');

    // Admin Recipe_preparation section
    Route::get('/recipe_preparation/create', 'PreparationController@create');
    Route::post('/recipe_preparation/store', 'PreparationController@store');
    Route::get('/recipe_preparation/view', 'PreparationController@show');
    Route::get('/recipe_preparation/edit/{id}', 'PreparationController@edit');
    Route::post('/recipe_preparation/update', 'PreparationController@update');
    Route::get('/recipe_preparation/delete/{id}', 'PreparationController@destroy');



});
Route::group(['middleware' => 'admin'], function () {

    Route::get('/logout', 'DashboardController@logout');

});


