<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Demand;
use App\Beneficiary;
class DemandsController extends Controller
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
        $demands = Demand::all();
        $beneficiaries = Beneficiary::all();
        return view('cuentasPorPagar.solicitud.create', [
            'companies' => $companies,
            'beneficiaries' => $beneficiaries,
            'demands' => $demands,
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
        Demand::create([
            'departamento' => $request->input('departamento'),
            'currentDate'  => $request->input('currentDate'),
            'payDate'  => $request->input('payDate'),
            'beneficary'  => $request->input('beneficary'),
            'contable'  => $request->input('contable'),
            'reason'  => $request->input('reason'),
            'coin'  => $request->input('coin'),
            'applicant'  => $request->input('applicant'),
            'company_id' => $request->input('empresa')
            ]);

        return redirect('/cuentas-por-pagar')->with('message', 'Tu solicitud ha sido creada de forma exitosa');
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
