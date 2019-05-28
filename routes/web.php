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
  Route::get('/cuentas-por-pagar', function(){ return view('cuentasPorPagar.index'); });

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
  Route::resource('demands', 'DemandsController');
  Route::resource('beneficiaries', 'BeneficiariesController');

  Route::get('/forpay', 'EditDemandsController@index');

Route::group(['middleware' => 'role'], function () {
  Route::get('/edit/demands/{id}', 'EditDemandsController@edit');
  Route::post('/update/demands/{id}', 'EditDemandsController@update');
});
  Route::post('/updatePaid/demands/{id}', 'EditDemandsController@updatePaid');
  Route::post('/upload/demand/{id}', 'UploadController@pdf');

  Route::get('/registers/list/index', 'ListController@list');
  Route::resource('accounts', 'AccountController');
  Route::resource('companies', 'CompanyController');
  Route::post('/searchCompany', 'CompanyController@search');
  Route::get('/empresas', 'CompanyController@empresas');
  Route::get('/verify/entry/{id}', 'EntriesController@verify');
  Route::post('/report/national', 'ReportController@makeReport');
  Route::post('/report/international', 'ReportController@makeReportInternational');
  Route::post('/companyEntriesExpenses', 'ReportController@companyEntriesExpenses');

  Route::get('/all/registers', 'RegistersModifyController@index');
  Route::get('/all/registers/international', 'RegistersModifyController@indexInternational');
  Route::get('/edit/register/{id}', 'RegistersModifyController@edit');
  Route::get('/edit/register/international/{id}', 'RegistersModifyController@editInternational');
  Route::post('/update/register/{id}', 'RegistersModifyController@update');
  Route::post('/update/register/international/{id}', 'RegistersModifyController@updateInternational');

  Route::get('/all/demands', 'DemandsModifyController@index');
  Route::get('/edit/demand/{id}', 'DemandsModifyController@edit');
  Route::post('/update/demand/{id}', 'DemandsModifyController@update');

  Route::get('/all/users', 'RegistersModifyController@users');
  Route::get('/edit/user/{id}', 'RegistersModifyController@edituser');
  Route::post('/update/user/{id}', 'RegistersModifyController@updateuser');
  Route::get('/facturacion-y-cobranza', function(){
    return view('facturacionYCobranza.index');
  });
  Route::get('/grupoplus', function(){
     return view('facturacionYCobranza.grupoplus.index');
  });
  Route::get('/tiendagf', function(){
    return view('facturacionYCobranza.tiendagf.index');
 });
 
  Route::resource('bills', 'BillsController');
  Route::resource('ebills', 'EbillsController');
  Route::resource('clients', 'ClientsController');
  Route::resource('sellers', 'SellersController');

  Route::get('/balances/bills', 'SaldosController@balances');
  Route::post('/searchClient', 'BillingScriptController@client');
  Route::get('/report/bill', 'BillingScriptController@report');
  Route::post('/search/bill', 'BillingScriptController@search');
  Route::get('/getDemand/{id}', 'PayController@show');
});

Auth::routes();
