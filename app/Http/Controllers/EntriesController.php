<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use App\Bank;
use App\Account;
use App\Company;
use App\Contable;

class EntriesController extends Controller
{
    public function home(){
      return view('entries.home');
    }

    public function index(){
      $registers = Register::where('type', 'Ingreso')->where('status', 'Diferido')->get();
      return view('entries.index', [
        'registers' => $registers,
      ]);
    }
    public function verify($id){
      $register = Register::find($id);
      return view('entries.verify', [
        'register' => $register
      ]);
    }

    public function create(){
      $accounts = Account::all();
      $companies = Company::all();
      $registers = Register::all();
      $contables = Contable::all();

      return view('entries.create', ['accounts' => $accounts,'companies' => $companies, 'registers' => $registers, 'contables' => $contables]);
    }

    public function store(Request $request){
      $account = Account::where('number', $request->input('bank'))->first();
      $register = Register::create([
        'date' => $request->input('date'),
        'type' => 'Ingreso',
        'beneficiary' => $request->input('beneficiary'),
        'status'=> $request->input('estatus'),
        'amount' => $request->input('amount'),
        'description' => $request->input('observation'),
        'contable' => $request->input('contableAccount'),
        'responsable' => $request->input('responsable'),
        'reason' => $request->input('reason'),
        'account_id' => $account->id,
      ]);
      if($register->type == 'Ingreso' && $register->status == 'Disponible'){
        $account->entry = $account->entry + $register->amount;
      }elseif($register->type == 'Ingreso' && $register->status == 'Diferido'){
        $account->notavailable = $account->notavailable + $register->amount;
        $account->transit = $account->transit + $register->amount;
      }
        $account->save();
      return redirect('/entries/home')->with('message', 'Se ha creado el registro correctamente!');
    }//store

    public function update(Request $request, $id){
      $register = Register::find($id);
      $register->verify = $request->input('verify');
      $register->verifyName = $request->input('verifyName');
      $register->save();
      return redirect()->back()->with('message', 'Actualizado');
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
