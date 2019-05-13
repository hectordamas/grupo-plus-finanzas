<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\User;
use App\Bank;
use App\Company;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $account = Account::find($id);
      $banks = Bank::all();
      $companies = Company::all();
        return view('configuracion.account.show', [
          'account' => $account,
          'companies' => $companies,
          'banks' => $banks
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $bank = Bank::find($request->input('bank_id'));
        $company = Company::find($request->input('company_id'));
        $account = Account::find($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
            $fileName = "/images/".$name;
          }else{
            $fileName = $company->image;
          }

        $bank->name = $request->input('bankName');
        $bank->type = $request->input('typeBank');
        $company->name = $request->input('name');
        $company->abbreviation = $request->input('abreviatura');
        $company->rif = $request->input('rif');
        $company->address = $request->input('address');
        $company->image = $fileName;
        $account->number = $request->input('accountNumber');
        $bank->save();
        $company->save();
        $account->save();
        return redirect('/companies')->with('message', 'La Cuenta ha sido actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
