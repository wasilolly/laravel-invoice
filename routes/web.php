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

Route::get('/', 'InvoiceController@allinvoice');

Route::get('/company', 'CompanyController@company')->name('company');
Route::PUT('/company', 'CompanyController@update')->name('company.update');
Route::get('/invoice/{id}', 'InvoiceController@orderinvoice')->name('invoice');
Route::get('/invoices', 'InvoiceController@allinvoice')->name('allinvoice');
Route::get('/statement', 'PaymentController@statement')->name('statement');
Route::resources([
	'customer'=>'CustomerController',
	'order'=>'OrderController',
	'payment'=>'PaymentController'
]);