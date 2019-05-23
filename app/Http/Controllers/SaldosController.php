<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;
use App\Company;
use App\Client;
use App\Seller;
class SaldosController extends Controller
{
    public function index(){
      $banks = Bank::all();
      $companies = Company::all();
      return view('international.saldos.index', [
        'companies' => $companies,
        'banks' => $banks
      ]);
    }

    public function balances(){
      $clients = Client::all();
      $companies = Company::all();
      $banks = Bank::all();
      $sellers = Seller::all();

      return view('facturacionYCobranza.grupoplus.saldos.index', [
        'clients' => $clients,
        'companies' => $companies,
        'banks' => $banks,
        'sellers' => $sellers
      ]);
    }

    public function report(){
    
      return view('facturacionYCobranza.grupoplus.report.index');
    }
}
