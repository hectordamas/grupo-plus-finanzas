<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Demand;
use App\Company;
use Mail;
use Auth;

class EditDemandsController extends Controller
{
    public function index(){
        $companies = Company::all();
        $demands = Demand::where('status', 'Aprobado')->where('paid', 'Por Pagar')->get();

        return view('cuentasPorPagar.solicitud.forpay', [
            'companies' => $companies,
            'demands' => $demands
        ]);
    }
    public function edit($id){
        $demand = Demand::find($id);
        return view('cuentasPorPagar.solicitud.edit', [
            'demand' => $demand
        ]);
    }

    public function updatePaid($id, Request $request){
        $demand = Demand::find($id);
        $demand->paid = $request->input('paid');
        $demand->save();
        return redirect()->back()->with('message', 'Modificado');
    }

    public function update(Request $request, $id){
        $demand = Demand::find($id);
        $demand->status = $request->input('status');
        $demand->save();

        Mail::send('cuentasPorPagar.solicitud.paidMail', ['demand'=> $demand], function($message) use ($demand){
            $subject = 'La solicitud N° '. $demand->id .' realizada por '. Auth::user()->name . ', ha sido aprobada';
            $email = 'grupoplus.imagen361@gmail.com';

            $message->to($email, $subject);
            $message->to($email)->subject($subject)->cc([Auth::user()->email, $demand->user->email]);
        });

        return redirect('/cuentas-por-pagar')->with('message', 'Tu solicitud ha sido modificada de forma exitosa');
    }


}
