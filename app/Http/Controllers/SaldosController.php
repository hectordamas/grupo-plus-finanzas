<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;
use App\Company;
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
}
