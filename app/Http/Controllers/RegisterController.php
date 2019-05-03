<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use App\Exchange;
use App\Transaction;
use App\Company;
use App\Account;
use App\Bank;
use App\Contable;

use Auth;

class RegisterController extends Controller
{
    public function index(){
        $banks = Bank::where('type', 'Banco Nacional')->get();
        $companies = Company::all();
        $accounts = Account::all();
        return view('national.Saldos.index', [
          'banks' => $banks,
          'accounts' => $accounts,
          'companies' => $companies
        ]);
    }//endindex

    public function create(){
      $banks = Bank::where('type', 'Banco Nacional')->get();
      $companies = Company::all();
      $accounts = Account::all();
      $registers = Register::all();
      $contables = Contable::all();
        return view('national.Register.create', [
          'banks' => $banks,
          'accounts' => $accounts,
          'companies' => $companies,
          'registers' => $registers,
          'contables' => $contables,
        ]);
    }//endcreate

    public function store(Request $request){
      if($request->input('TipoRegistro') == 'Cambio de Divisa'){
          $bancoDestino = Account::where('number', $request->input('BancoDestino'))->first();
          $register = Register::create([
            'date' => $request->input('fecha1'),
            'type' => 'Ingreso',
            'status'=> 'Diferido',
            'reason' => 'Cambio de Divisa',
            'contable' => 'Cambio de Divisa',
            'amount' => $request->input('Cantidad'),
            'description' => $request->input('Concepto'),
            'rate' => $request->input('Tasa'),
            'responsable' => $request->input('Responsable'),
            'concept' => $request->input('Concepto'),
            'seller' => $request->input('Vendedor'),
            'account_id' => $bancoDestino->id,
          ]);//Register::create
          $bancoDestino->notavailable = $bancoDestino->notavailable + $register->amount;
          $bancoDestino->save();
          $transacciones = $request->input('CantidadDeTransacciones');
          for ($i=0; $i < $transacciones; $i++) {
            $account = Account::where('number', $request->input('BancoNacionalDeTransacciones'.$i))->first();
            $registerEgreso = Register::create([
              'date' => $request->input('fecha1'),
              'type' => 'Egreso',
              'beneficiary' => $request->input('BeneficiarioDeTransacciones'. $i),
              'status'=> 'Pagado',
              'reason' => 'Cambio de Divisa',
              'contable' => 'Cambio de Divisa',
              'amount' => $request->input('MontoDeTransacciones'. $i),
              'description' => $request->input('Concepto'),
              'responsable' => $request->input('Responsable'),
              'concept' => $request->input('Concepto'),
              'seller' => $request->input('Vendedor'),
              'rate' => $request->input('Tasa'),
              'account_id' => $account->id,
            ]);//Register::create
            $account->expense = $account->expense + $registerEgreso->amount;
            $account->save();
          }//endfor
      }else{/////////////////////////////
            $account = Account::where('number', $request->input('bank1'))->first();
            $register = Register::create([
              'date' => $request->input('fecha'),
              'type' => $request->input('TipoRegistro'),
              'beneficiary' => $request->input('Beneficiario'),
              'reason' => $request->input('Motivo'),
              'status' => $request->input('Status'),
              'contable' => $request->input('CuentaContable'),
              'amount' => $request->input('Monto') + $request->input('Feedx'),
              'rate' =>$request->input('TASA'),
              'description' => $request->input('Observaciones'),
              'feed' => $request->input('Feedx'),
              'account_id' => $account->id
            ]);//////Register::Create/////////////////////////////
            //Ingresos y egresos Para bancos y empresas
            if($register->type == 'Ingreso' && $register->status == 'Disponible'){
              $account->entry = $account->entry + $register->amount;
            }elseif($register->type == 'Ingreso' && $register->status == 'Diferido'){
              $account->notavailable = $account->notavailable + $register->amount;
            }elseif($register->type == 'Egreso' && $register->status == 'Girado'){
              $account->transit = $account->transit + $register->amount;
            }elseif($register->type == 'Egreso' && $register->status == 'Pagado'){
              $account->expense = $account->expense + $register->amount;
            }
      }//endif
      $account->save();
      return redirect('/bancos-nacionales')->with('message', 'El registro se ha guardado correctamente!');
    }//endstore

    public function update(Request $request, $id){
      $register = Register::find($id);
      if($register->verify != $request->input('verify') || $register->verifyName != $request->input('verifyName') || $register->status != $request->input('status')){
          $register->verify = $request->input('verify');
          $register->status = $request->input('status');
          if($register->verify){
            $register->status = 'Disponible';
            $register->verifyName = Auth::user()->initials;
          }else{
            $register->verifyName = '';
          }
          $register->save();
          $account = Account::where('number', $register->account->number)->first();
          if($register->verify && $register->status == 'Disponible'){
            $account->notavailable = $account->notavailable - $register->amount;
            $account->entry = $account->entry + $register->amount;
          }elseif($register->status == 'Diferido'){
            $account->notavailable = $account->notavailable + $register->amount;
            $account->entry = $account->entry - $register->amount;
          }elseif($register->type == "Pagado") {
            $account->transit = $account->transit - $register->amount;
            $account->expense = $account->expense + $register->amount;
          }elseif($register->type == "Girado"){
            $account->transit = $account->transit + $register->amount;
            $account->expense = $account->expense - $register->amount;
          }
        $account->save();
      }//endif
      if($register->account->bank->type == 'Banco Internacional'){
        return redirect('/entries/home')->with('message', 'El registro con ID '.$register->id.' se ha guardado correctamente!');
      }else{
        return redirect('/registers/list/index')->with('message', 'El registro con ID '.$register->id.' se ha guardado correctamente!');
      }
    }//endupdate


    public function destroy($id){
      $register = Register::find($id);
      $account = Account::where('number', $register->account->number)->first();
      if($register->status == 'Diferido'){
        $account->notavailable = $account->notavailable - $register->amount;
      }elseif($register->status == 'Disponible'){
        $account->entry = $account->entry - $register->amount;
      }elseif($register->type == "Girado") {
        $account->transit = $account->transit - $register->amount;
      }elseif($register->type == "Pagado"){
        $account->expense = $account->expense - $register->amount;
      }
     $account->save();
      Register::destroy($id);
      return redirect()->back()->with('message', 'El registro con ID '.$id.' ha sido Eliminado');
    }//enddestroy
    public function show($id){}//endshow
    public function edit($id){}//endedit
}
