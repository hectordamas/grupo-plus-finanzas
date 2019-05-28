<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Bill;
use App\Ebill;
use App\Seller;
use App\Company;

class BillingScriptController extends Controller
{
    public function report(){
        $clients = Client::all();
        $sellers = Seller::all();
        $companies = Company::all();

        return view('facturacionYCobranza.grupoplus.report.search',[
            'clients' => $clients,
            'sellers' => $sellers,
            'companies' => $companies
        ]);
    }

    public function search(Request $request){
        $from = $request->input('from');
        $to = $request->input('to');
        $date = $request->input('date');
        $seller = $request->input('seller');
        $client = $request->input('client');
        $company = $request->input('company');

        $bills = Bill::range($from, $to)->date($date)->client($client)->seller($seller)->company($company)->get();
        $ebills = Ebill::range($from, $to)->date($date)->client($client)->seller($seller)->company($company)->get();

        $totalBills = 0;
        $totalUSDBills = 0;
        foreach($bills as $bill){
            $totalBills = $totalBills + $bill->amount;
            $totalUSDBills = $totalUSDBills + ($bill->amount / $bill->rate);
        }

        $totalEbills = 0;
        $totalUSDEbills = 0;
        foreach($ebills as $ebill){
            if($ebill->currency == 'Bolívares'){
                $totalEbills = $totalEbills + $ebill->amount;
                $totalUSDEbills = $totalUSDEbills + ($ebill->amount / $ebill->rate);
            }else{
                $totalUSDEbills = $totalUSDEbills + $ebill->amount;
                $totalEbills = $totalEbills + ($ebill->amount * $ebill->rate);
            }
        }
        return view('facturacionYCobranza.grupoplus.report.index', [
            'bills' => $bills,
            'ebills' => $ebills,
            'totalBills' => $totalBills,
            'totalUSDBills' => $totalUSDBills,
            'totalEbills' => $totalEbills,
            'totalUSDEbills' => $totalUSDEbills
        ]);
    }
}
