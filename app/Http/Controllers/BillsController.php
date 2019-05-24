<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Bill;
use App\Client;
use App\Seller;

class BillsController extends Controller
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
        $bills = Bill::all();
        $clients = Client::all();
        $sellers = Seller::all();

        return view('facturacionYCobranza.grupoplus.bills.create', [
            'companies' => $companies,
            'bills' => $bills,
            'clients' => $clients, 
            'sellers' => $sellers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
     
    $searchSeller = Seller::where('name', $request->input('seller'))->first();
    $client = Client::where('rif', $request->input('client'))->first();

    if($searchSeller){
        $seller = $searchSeller;
    }else{
        $seller = Seller::create([
            'name' => $request->input('seller'),
        ]);
    }

        $bill = Bill::create([
            'type' => $request->input('type'),
            'rate' => $request->input('rate'),
            'amount' => $request->input('amount'),
            'date' => $request->input('date'),
            'company_id' => $request->input('company'),
            'client_id' => $client->id,
            'number' => $request->input('number'),
            'seller_id' => $seller->id
        ]);

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
