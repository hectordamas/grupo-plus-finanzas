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
Route::get('/', function () {return view('auth.login');});
Route::group(['middleware' => 'auth'], function () {
  Route::get('/', function(){return view('home');});
  Route::get('/home', function(){return view('home');});
  Route::get('/bancos-nacionales', function(){return view('national.index');});
  Route::get('/bancos-internacionales', function(){return view('international.index');});
  Route::get('/usuarios-configuracion', function(){ return view('configuracion.index'); });

  Route::get('/reportes', 'ReportController@search');
  Route::get('/reportes/internacionales', 'ReportController@internationaReport');

  Route::post('/makeFilter', 'ReportController@makeFilter');
  Route::post('/selectTransaction', 'ReportController@selectTransaction');
  Route::post('/showAccountNumber', 'ReportController@showAccountNumber');
  Route::post('/showAccountNumber1', 'ReportController@showAccountNumber1');
  Route::post('/showAccountNumberReport', 'ReportController@showAccountNumberReport');
  Route::post('/FindAccountsByCompanyAndBank', 'EntriesController@FindAccountsByCompanyAndBank');
  Route::get('/entries/create', 'EntriesController@create');
  Route::get('/entries/home', 'EntriesController@home');
  Route::get('/entries', 'EntriesController@index');
  Route::post('/entries/create', 'EntriesController@store');
  Route::get('/expenses/create', 'ExpensesController@create');
  Route::post('/expenses/create', 'ExpensesController@store');
  Route::get('/saldos', 'SaldosController@index');
  Route::resource('registers', 'RegisterController');
  Route::get('/registers/list/index', 'ListController@list');
  Route::resource('accounts', 'AccountController');
  Route::resource('companies', 'CompanyController');
  Route::post('/searchCompany', 'CompanyController@search');
  Route::get('/empresas', 'CompanyController@empresas');
  Route::get('/verify/entry/{id}', 'EntriesController@verify');
  Route::post('/report/national', 'ReportController@makeReport');
  Route::post('/report/international', 'ReportController@makeReportInternational');
  Route::post('/companyEntriesExpenses', 'ReportController@companyEntriesExpenses');
});

Auth::routes();
