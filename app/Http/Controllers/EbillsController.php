<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Client;
use App\Ebill;
use App\Register;
use App\Account;

class EbillsController extends Controller
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
        $companies = Company::all();
        $clients = Client::all();

        return view('facturacionYCobranza.grupoplus.ebills.create', [
            'companies' => $companies,
            'clients' => $clients
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
        $ebill = Ebill::create([
            'account_id' => $account->id,
            'client_id' => $request->input('client'),
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
            'status' => 'Disponible',
            'contable' => 'N/A',
            'amount' => $ebill->amount,
            'rate' => $ebill->rate,
            'description' => $ebill->description,
            'account_id' => $account->id,
            'bill' => 'Sí',
          ]);//////Register::Create/////////////////////////////
            $account->entry = $account->entry + $register->amount;
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
    {
        //
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
