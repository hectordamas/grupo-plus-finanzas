<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Bill;
use App\Ebill;



class BillingScriptController extends Controller
{
    public function client(Request $request){
        $client = Client::where('name', $request->client)->first();

        return response()->json([
            'seller' => $client->seller->name
        ]);
    }

    public function report(){
        return view('facturacionYCobranza.grupoplus.report.search');
    }

    public function search(Request $request){
        $from = $request->input('from');
        $to = $request->input('to');
        $date = $request->input('date');

        $bills = Bill::range($from, $to)->date($date)->get();
        $ebills = Ebill::range($from, $to)->date($date)->get();

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
