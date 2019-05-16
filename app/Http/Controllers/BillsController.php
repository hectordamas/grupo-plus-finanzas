<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Bill;

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

        return view('facturacionYCobranza.bills.create', [
            'companies' => $companies,
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
        $bill = Bill::create([
            'type' => $request->input('type'),
            'amount' => $request->input('amount'),
            'date' => $request->input('date'),
            'client' => $request->input('client'),
            'company_id' => $request->input('company'),
            'number' => $request->input('number'),
            'seller' => $request->input('seller'),
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
