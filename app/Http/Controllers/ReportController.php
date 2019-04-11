<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Bank;
use App\Company;
use App\Account;
use App\Register;
use App\Exchange;
use DateTime;
use App\Transaction;

class ReportController extends Controller
{
    public function search(){
      $banks = Bank::where('type', 'Banco Nacional')->get();
      $companies = Company::all();
      $accounts = Account::all();
      $registers = Register::all();
      return view('Reportes.search', [
        'banks' => $banks,
        'companies' => $companies,
        'accounts' => $accounts,
        'registers' => $registers
      ]);
    }

    public function selectTransaction(Request $request){
      $outputAccountNumber = '';
      $accounts = Account::all();
      foreach ($accounts as $account) {
        if($account->bank->type == "Banco Nacional"){
          $outputAccountNumber = $outputAccountNumber.'<option value="'.$account->number.'">'.$account->number.' - '.$account->bank->name.' - '.$account->company->name.'</option>';
        }//endif
      }//endforeach
      return response()->json([
        'outputAccountNumber' => $outputAccountNumber,
      ]);
    }

    public function showAccountNumberReport(Request $request){
      $outputBank = '';
      $company = Company::where('name', $request->company)->first();
      $accounts = Account::where('company_id', $company->id)->get();
      foreach ($accounts as $account) {
        if ($account->bank->type == 'Banco Nacional') {
          $outputBank = $outputBank.'<option value="'.$account->bank->name.'">'.$account->bank->name.'</option>';
        }
      }
      return response()->json([
        'outputBank' => $outputBank,
      ]);
    }

    public function showAccountNumber(Request $request){
      $outputAccountNumber = '';
      $company = Company::where('name', $request->company)->first();
      $accounts = Account::where('company_id', $company->id)->get();
      foreach ($accounts as $account) {
        if ($account->bank->type == 'Banco Internacional') {
          $outputAccountNumber = $outputAccountNumber.'<option value="'.$account->bank->name.'">'.$account->bank->name.'</option>';
        }
      }
      return response()->json([
        'outputAccountNumber' => $outputAccountNumber,
      ]);
    }

    public function showAccountNumber1(Request $request){
      $outputAccountNumber = '';
      $company = Company::where('name', 'LIKE', "%$request->company%")->first();
      $accounts = Account::where('company_id', $company->id)->get();
      foreach ($accounts as $account) {
        if ($account->bank->type == 'Banco Nacional') {
          $outputAccountNumber = $outputAccountNumber.'<option value="'.$account->number.'">'.$account->bank->name.'</option>';          // code...
        }
      }
      return response()->json([
        'outputAccountNumber' => $outputAccountNumber,
      ]);
    }


    public function internationaReport(){
      $banks = Bank::where('type', 'Banco Internacional')->get();
      $companies = Company::all();
      $accounts = Account::all();
      $registers = Register::all();
      $transactions = Transaction::all();
      return view('international.report.search',[
        'banks' => $banks,
        'companies' => $companies,
        'accounts' => $accounts,
        'registers' => $registers
      ]);
    }//internationaReport

    public function companyEntriesExpenses(Request $request){
      $outputAccountNumber = '';
      $company = Company::where('name', $request->company)->first();
      $accounts = Account::where('company_id', $company->id)->get();
      foreach ($accounts as $account) {
        if ($account->bank->type == 'Banco Internacional') {
          $outputAccountNumber = $outputAccountNumber.'<option value="'.$account->number.'">'.$account->bank->name.'</option>';          // code...
        }
      }
      return response()->json([
        'outputAccountNumber' => $outputAccountNumber,
      ]);
    }//companyEntriesExpenses

    public function makeReportInternational(Request $request){
      $montos = $request->input('monto'); $desde = $request->input('desde'); $hasta = $request->input('hasta');$beneficiarios=$request->input('beneficiarios');
      $status = $request->input('Status'); $observaciones = $request->input('observation');$contable = $request->input('contable');
      $tipo = $request->input('type');$motivo = $request->input('motivo');$responsable = $request->input('responsable');

      $registerQuery = Register::whereBetween('date', [$desde, $hasta])->type($tipo)->beneficiary($beneficiarios)->responsable($responsable)->reason($motivo)->status($status)->description($observaciones)->contable($contable); 
      if($request->input('bancos') && $request->input('empresas')){
        $bank = Bank::where('name',$request->input('bancos'))->first();
        $company = Company::where('name', $request->input('empresas'))->first();
        $account = Account::where('bank_id', $bank->id)->where('company_id', $company->id)->first();
          if ($montos) {
          $registers = $registerQuery->where('amount', $montos)->where('account_id', $account->id)->get();
          }else{
          $registers = $registerQuery->where('account_id', $account->id)->get();
          }//endif
      }else{
          if($montos){
            $registers = $registerQuery->where('amount', $montos)->get();
          }else{
            $registers = $registerQuery->get();
          }//endif
      }//endif
      return view('international.report.index',[
        'registers' => $registers
      ]);
    }//makeReportInternational


///Ejemplo de lo que nunca se debe hacer
    public function makeReport(Request $request){
      $montos = $request->input('monto'); $desde = $request->input('desde'); $hasta = $request->input('hasta');$beneficiarios=$request->input('beneficiarios');
      $status = $request->input('Status'); $observaciones = $request->input('observation');$contable = $request->input('contable');
      $tipo = $request->input('type');$motivo = $request->input('motivo');

      $registerQuery = Register::whereBetween('date', [$desde, $hasta])->type($tipo)->beneficiary($beneficiarios)->reason($motivo)->status($status)->description($observaciones)->contable($contable); 
      if($request->input('bancos') && $request->input('empresas')){
        $bank = Bank::where('name',$request->input('bancos'))->first();
        $company = Company::where('name', $request->input('empresas'))->first();
        $account = Account::where('bank_id', $bank->id)->where('company_id', $company->id)->first();
          if ($montos) {
          $registers = $registerQuery->where('amount', $montos)->where('account_id', $account->id)->get();
          }else{
          $registers = $registerQuery->where('account_id', $account->id)->get();
          }//endif
      }else{
          if($montos){
            $registers = $registerQuery->where('amount', $montos)->get();
          }else{
            $registers = $registerQuery->get();
          }
      }//endif
      return view('Reportes.index',[
        'registers' => $registers
      ]);
    }//makeReport
}
