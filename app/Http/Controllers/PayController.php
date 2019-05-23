<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Demand;

class PayController extends Controller
{
    public function show($id){
        $demand = Demand::find($id);

        return response()->json([
            'demand' => $demand,
            'company' => $demand->company,
            'beneficiary' => $demand->beneficiary
        ]);
    }
}
