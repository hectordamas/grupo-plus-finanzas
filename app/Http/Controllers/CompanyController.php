<?php

namespace App\Http\Controllers;
use App\Company;
use App\Bank;
use App\Account;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(){
      $companies = Company::all();
      return view('Empresas.empresas', [
        'companies' => $companies
      ]);
    }//endindex


    public function create(){
        $banks = Bank::all();
        $companies = Company::all();
         return view('Empresas.create', ['banks' => $banks, 'companies' => $companies]);
    }///////////////////endcreate


    public function store(Request $request){
        $bank = Bank::where('name', $request->input('bankName'))->first();
        if($bank){
          $bank->name = $request->input('bankName');
          $bank->type = $request->input('typeBank');
          $bank->save();
        }else{
          $bank = Bank::create([
            'name' => $request->input('bankName'),
            'type' => $request->input('typeBank'),
          ]);//endbank::create
        }//endelse
        $company = Company::where('name', $request->input('name'))->first();
        if ($request->hasFile('image')) {
          $file = $request->file('image');
          $name = time().$file->getClientOriginalName();
          $file->move(public_path().'/images/', $name);
          $fileName = "/images/".$name;
        }else{
          $fileName = '';
        }
        if($company){
          $company->name = $request->input('name');
          $company->abbreviation = $request->input('abreviatura');
          $company->rif = $request->input('rif');
          $company->address = $request->input('address');
          $company->image = $fileName;
          $company->save();
        }else{
          $company = Company::create([
            'name' => $request->input('name'),
            'abbreviation' => $request->input('abreviatura'),
            'rif' => $request->input('rif'),
            'address' => $request->input('address'),
            'image' => $fileName,
          ]);//endcompany::create
        }//endelse
        $account = Account::create([
          'number' => $request->input('accountNumber'),
          'bank_id' => $bank->id,
          'company_id' => $company->id,
        ]);
      return redirect('/companies')->with('message', 'La Empresa ha sido registrada correctamente');
    }//endstore

    public function search(Request $request){
        $company = Company::where('name', $request->company)->first();
        return response()->json([
          'company' => $company
          ]);
    }

    public function show($id){
      $company = Company::find($id);
      return view('Empresas.show', [
        'company' => $company
      ]);
    }//endshow


    public function edit($id){
    }//endedit


    public function update(Request $request, $id){
    }//endupdate


    public function destroy($id){
    }//enddestroy


}
