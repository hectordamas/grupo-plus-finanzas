<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Demand;
use App\Contable;
use App\Beneficiary;
use App\Company;
use Auth;


class DemandsModifyController extends Controller
{
    public function index(){
        $demands = Demand::all();
        $beneficiaries = Beneficiary::all();

        return view('modify.demands.index', [
            'demands' => $demands,
            'beneficiaries' => $beneficiaries,

        ]);
    }

    public function edit($id){
        $demands = Demand::all();
        $demand = Demand::find($id);
        $contables = Contable::all();
        $beneficiaries = Beneficiary::all();
        $companies = Company::all();

        return view('modify.demands.edit', [
            'demand' => $demand,
            'demands' => $demands,
            'contables' => $contables,
            'beneficiaries' => $beneficiaries,
            'companies' => $companies
        ]);
    }

    public function update($id, Request $request){
        $demand = Demand::find($id);
        $beneficiary = Beneficiary::find($request->input('beneficiary'));

        $demand->departamento = $request->input('departamento');
        $demand->company_id = $request->input('empresa');
        $demand->currentDate  = $request->input('currentDate');
        $demand->payDate = $request->input('payDate');
        $demand->contable = $request->input('contable');
        $demand->reason = $request->input('reason');
        $demand->amount = $request->input('amount');
        $demand->coin = $request->input('coin');
        $demand->beneficiary_id = $beneficiary->id;
        $demand->modify_by = Auth::user()->name;
        $demand->save();

        return redirect('/all/demands')->with('message', 'La solicitud se ha modificado de forma exitosa');
    }


}
