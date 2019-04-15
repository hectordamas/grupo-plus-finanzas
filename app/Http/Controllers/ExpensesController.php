<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use App\Bank;
use App\Account;
use App\Company;
class ExpensesController extends Controller
{

    public function create()
    {
      $banks = Bank::where('type', 'Banco Internacional')->get();
      $companies = Company::all();
      $registers = Register::all();
      return view('expenses.create', ['banks' => $banks,'companies' => $companies, 'registers' => $registers]);
    }


    public function store(Request $request)
    {
      $account = Account::where('number', $request->input('bank'))->first();
      $register = Register::create([
        'date' => $request->input('date'),
        'type' => 'Egreso',
        'beneficiary' => $request->input('beneficiary'),
        'status'=> $request->input('estatus'),
        'amount' => $request->input('amount'),
        'description' => $request->input('observation'),
        'contable' => $request->input('contableAccount'),
        'responsable' => $request->input('responsable'),
        'reason' => $request->input('reason'),
        'account_id' => $account->id,
      ]);
      $account->expense = $account->expense + $register->amount;
      $account->save();
      return redirect('/bancos-internacionales')->with('message', 'Se ha creado el registro correctamente!');
    }

    public function FindAccountsByCompanyAndBank(Request $request){
      $accounts = Account::where('bank', $request->input('bank'))->where('company', $request->input('company'))->get();
      $outputAccounts = '';
      foreach ($accounts as $account) {
        $outputAccounts = $outputAccounts.'<option value="'.$account->number.'">'.$account->number.'</option>';
      }
      return response()->json([
        'outputAccounts' => $outputAccounts,
      ]);
    }


}
