<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');


//Route::get('/home', 'HomeController@index')->middleware('verified');

Route::resource('roles', 'RoleController')->middleware('supervisors');

Route::resource('users', 'UserController')->middleware('supervisors');

Route::resource('managers', 'ManagerController')->middleware('role');

Route::resource('categories', 'CategorieController')->middleware('employee');

Route::resource('products', 'ProductController')->middleware('employee');

Route::resource('branches', 'BranchesController')->middleware('role');

Route::resource('departments', 'DepartmentController')->middleware('role');

Route::resource('employees', 'EmployeeController')->middleware('role');

Route::resource('customers', 'CustomerController')->middleware('employee');

Route::resource('suppliers', 'SupplierController')->middleware('role');

Route::resource('quotations', 'QuotationController')->middleware('employee');

Route::get('products/lims_product_search', 'ProductController@limsProductSearch')->name('product.search');
Route::get('products/search', 'ProductController@search');
