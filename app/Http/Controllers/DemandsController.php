<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Demand;
use App\Beneficiary;
use App\Contable;

use Auth;
use Mail;

class DemandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demands = Demand::orderBy('id', 'desc')->where('status', 'En Revisión')->get();
        $companies = Company::all();
        return view('cuentasPorPagar.solicitud.index', [
            'demands' => $demands,
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
        $demands = Demand::all();
        $beneficiaries = Beneficiary::all();
        $contables = Contable::all();
        return view('cuentasPorPagar.solicitud.create', [
            'companies' => $companies,
            'beneficiaries' => $beneficiaries,
            'demands' => $demands,
            'contables' => $contables
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
        $beneficiary = Beneficiary::find($request->input('beneficiary'));
        $demand = Demand::create([
            'departamento' => $request->input('departamento'),
            'currentDate'  => $request->input('currentDate'),
            'payDate'  => $request->input('payDate'),
            'beneficary'  => $beneficiary->name,
            'beneficiary_id'=> $beneficiary->id,
            'user_id' => Auth::id(),
            'contable'  => $request->input('contable'),
            'reason'  => $request->input('reason'),
            'amount'  => $request->input('amount'),
            'status' => 'En Revisión',
            'coin'  => $request->input('coin'),
            'applicant'  => Auth::user()->name,
            'company_id' => $request->input('empresa'),
            'paid' => 'Por Pagar',
        ]);
        Mail::send('cuentasPorPagar.solicitud.mail', ['demand'=> $demand], function($message) use ($demand){
            $subject = 'Verifica la solicitud N° '. $demand->id .' realizada por '. Auth::user()->name;
            $email = 'grupoplus.imagen361@gmail.com';

            $message->from($email, $subject);
            $message->to($email)->subject($subject)->cc(['freyerilabrador@gmail.com', 'ggabboc@hotmail.com']);
        });
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
