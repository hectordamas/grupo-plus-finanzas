<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Register;
use App\Company;
use App\Contable;
use App\Account;
use Auth;
use App\User;

class RegistersModifyController extends Controller
{
    public function index(Request $request){
        $registers = Register::all();
        return view('modify.registers.index', [
            'registers' => $registers
        ]);
    }

    public function indexInternational(Request $request){
        $registers = Register::all();
        return view('modify.registers.indexInternational', [
            'registers' => $registers
        ]);
    }

    public function edit($id){
        $register = Register::find($id);
        $companies = Company::all();
        $contables = Contable::all();
        $registers = Register::all();
        
        return view('modify.registers.edit', [
            'register' => $register,
            'contables' => $contables,
            'companies' => $companies,
            'registers' => $registers
        ]);
    }

    public function editInternational($id){
        $register = Register::find($id);
        $companies = Company::all();
        $contables = Contable::all();
        $registers = Register::all();
        
        return view('modify.registers.editInternational', [
            'register' => $register,
            'contables' => $contables,
            'companies' => $companies,
            'registers' => $registers
        ]);
    }
    public function updateInternational($id, Request $request){
        $register = Register::find($id);
        $account = Account::where('number', $request->input('bank1'))->first();

        if($register->type == 'Ingreso' && $register->type == 'Disponible'){
            $account->entry = $account->entry - $register->amount;
        }elseif($register->type == 'Ingreso' && $register->type == 'Diferido'){
            $account->notavailable = $account->notavailable - $register->amount;
        }elseif($register->type == 'Egreso' && $register->type == 'Pagado'){
            $account->expense = $account->expense - $register->amount;
        }elseif($register->type == 'Egreso' && $register->type == 'Girado'){
            $account->transit = $account->transit - $register->amount;
        }
        $account->save();

        $register->beneficiary = $request->input('beneficiary');
        $register->reason = $request->input('reason');
        $register->amount = $request->input('amount');
        $register->responsable = $request->input('responsable');
        $register->description = $request->input('observation');
        $register->contable = $request->input('contable');
        $register->modify_by = Auth::user()->name;
        $register->save();

        if($register->type == 'Ingreso' && $register->type == 'Disponible'){
            $account->entry = $account->entry + $register->amount;
        }elseif($register->type == 'Ingreso' && $register->type == 'Diferido'){
            $account->notavailable = $account->notavailable + $register->amount;
        }elseif($register->type == 'Egreso' && $register->type == 'Pagado'){
            $account->expense = $account->expense + $register->amount;
        }elseif($register->type == 'Egreso' && $register->type == 'Girado'){
            $account->transit = $account->transit + $register->amount;
        }
        $account->save();

        return redirect('/all/registers/international')->with('message', 'El registro se ha modificado de forma exitosa');
    }

    public function update($id, Request $request){
        $register = Register::find($id);
        $account = Account::where('number', $request->input('bank1'))->first();

        if($register->type == 'Ingreso' && $register->type == 'Disponible'){
            $account->entry = $account->entry - $register->amount;
        }elseif($register->type == 'Ingreso' && $register->type == 'Diferido'){
            $account->notavailable = $account->notavailable - $register->amount;
        }elseif($register->type == 'Egreso' && $register->type == 'Pagado'){
            $account->expense = $account->expense - $register->amount;
        }elseif($register->type == 'Egreso' && $register->type == 'Girado'){
            $account->transit = $account->transit - $register->amount;
        }
        $account->save();

        $register->beneficiary = $request->input('Beneficiario');
        $register->reason = $request->input('Motivo');
        $register->amount = $request->input('Monto');
        $register->rate = $request->input('TASA');
        $register->description = $request->input('Observaciones');
        $register->contable = $request->input('CuentaContable');
        $register->modify_by = Auth::user()->name;
        $register->save();

        if($register->type == 'Ingreso' && $register->type == 'Disponible'){
            $account->entry = $account->entry + $register->amount;
        }elseif($register->type == 'Ingreso' && $register->type == 'Diferido'){
            $account->notavailable = $account->notavailable + $register->amount;
        }elseif($register->type == 'Egreso' && $register->type == 'Pagado'){
            $account->expense = $account->expense + $register->amount;
        }elseif($register->type == 'Egreso' && $register->type == 'Girado'){
            $account->transit = $account->transit + $register->amount;
        }
        $account->save();

        return redirect('/all/registers')->with('message', 'El registro se ha modificado de forma exitosa');
    }

    public function users(){
        $users = User::all();
        return view('modify.users.index', [
            'users' => $users
        ]);
    }

    public function edituser($id){
        $user = User::find($id);

        return view('modify.users.edit', [
            'user' => $user
        ]);
    }
    

    
    public function updateuser($id, Request $request){
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->initials = $request->input('initials');
        $user->role = $request->input('role');
        $user->email = $request->input('email');

        if($request->input('password')){
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        return redirect('/all/users')->with('message', 'El Usuario se ha modificado de forma exitosa');    }

}
