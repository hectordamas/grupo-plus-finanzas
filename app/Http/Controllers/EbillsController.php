<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Client;
use App\Ebill;
use App\Register;
use App\Account;
use App\Bill;
use App\Seller;

class EbillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ebills = Ebill::all();
        $clients = Client::all();
        $companies = Company::all();
        return view('modify.ebills.index', [
            'ebills' => $ebills,
            'clients' => $clients,
            'companies' => $companies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $clients = Client::all();
        $bills = Bill::all();

        return view('facturacionYCobranza.grupoplus.ebills.create', [
            'companies' => $companies,
            'clients' => $clients,
            'bills' => $bills
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $account = Account::where('number', $request->input('bank'))->first();
        $bill = Bill::where('number', $request->input('billNumber'))->first();
        $ebill = Ebill::create([
            'date' => $request->input('date'),
            'account_id' => $account->id,
            'client_id' => $request->input('client'),
            'seller_id' => $bill->seller->id,
            'currency' => $request->input('coin'),
            'description' => $request->input('observation'),
            'amount' => $request->input('amount'),
            'rate' => $request->input('rate'),
        ]);
        $register = Register::create([
            'date' => $request->input('date'),
            'type' => 'Ingreso',
            'beneficiary' => $ebill->client->name,
            'reason' => 'N/A',
            'status' => 'Diferido',
            'contable' => 'N/A',
            'amount' => $ebill->amount,
            'rate' => $ebill->rate,
            'description' => $ebill->description,
            'account_id' => $account->id,
            'bill' => 'Sí',
          ]);//////Register::Create/////////////////////////////
            $account->notavailable = $account->notavailable + $register->amount;
            $account->save();
        return redirect('/grupoplus')->with('message', 'Su registro se ha creado de manera existosa!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ebill = Ebill::find($id);
        $bills = Bill::all();
        $sellers = Seller::all();
        $companies = Company::all();
        $clients = Client::all();
        return view('modify.ebills.edit', [
            'ebill' => $ebill,
            'sellers' => $sellers,
            'clients' => $clients,
            'bills' => $bills,
            'companies' => $companies
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ebill = Ebill::find($id);
        $account = Account::where('number', $request->input('bank'))->first();
            $ebill->account_id = $account->id;
            $ebill->client_id = $request->input('client');
            $ebill->seller_id = $request->input('seller');
            $ebill->currency = $request->input('coin');
            $ebill->description = $request->input('observation');
            $ebill->amount = $request->input('amount');
            $ebill->rate = $request->input('rate');
            $ebill->save();

            return redirect('/ebills')->with('message', 'Su Ingreso se ha modificado de manera existosa!');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ebill::destroy($id);
        
        return redirect('/ebills')->with('message', 'Su ingreso de pago se ha eliminado de manera existosa!');
    }
}
