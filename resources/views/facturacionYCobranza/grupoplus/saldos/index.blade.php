@extends('layouts.interface')
@section('content')
<div class="container-fluid">
    <br> <br>
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center" style="color:white;">Saldos</h2>
        </div>
    </div>

    <div class="row">

        <div style="width:33.33%;">
            <div class="card ml-1 mr-1 mb-2">
                <div class="card-body d-flex justify-content-center">
                <table class="table table-bordered table-striped" style="width:100%;">
                    <thead>
                        <th colspan="4" class="text-center">
                            Clientes
                        </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Cliente</strong></td>
                            <td><strong>Debe</strong></td>
                            <td><strong>Haber</strong></td>
                            <td><strong>Saldo</strong></td>
                        </tr>
                        @foreach($clients as $client)
                            @php
                                $totalBills = 0;
                                $totalEbills = 0;

                                foreach($client->bills as $bill){
                                    $amount = $bill->amount / $bill->rate;
                                    $totalBills = $totalBills + $amount;
                                }

                                foreach($client->ebills as $ebill){
                                    if($ebill->currency == 'Bolívares'){
                                        $amount = $ebill->amount / $ebill->rate;
                                        $totalEbills = $totalEbills + $amount;   
                                    }else{
                                        $amount = $ebill->amount;
                                        $totalEbills = $totalEbills + $amount;   
                                    }
                                }
                            @endphp
                            <tr>
                                <td>
                                    {{$client->name}}
                                </td>
                                <td>{{ number_format($totalBills,2, '.', ',') }} USD</td>
                                <td>{{ number_format($totalEbills,2, '.', ',') }} USD</td>
                                <td>{{ number_format($totalBills - $totalEbills,2, '.', ',') }} USD</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>

        <div style="width:33.33%;">
            <div class="card ml-1 mr-1 mb-2">
                <div class="card-body d-flex justify-content-center">
                <table class="table table-bordered table-striped" style="width:100%;">
                    <thead>
                        <th colspan="4" class="text-center">
                            Empresas
                        </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Empresa</strong></td>
                            <td><strong>Debe</strong></td>
                            <td><strong>Haber</strong></td>
                            <td><strong>Saldo</strong></td>
                        </tr>
                        @foreach($companies as $company)
                            @php
                                $totalBills = 0;
                                $totalEbills = 0;
                                
                                foreach($company->accounts as $account){
                                    foreach($account->ebills as $ebill){
                                        if($ebill->currency == 'Bolívares'){
                                             $amount = $ebill->amount / $ebill->rate;
                                             $totalEbills = $totalEbills + $amount;   
                                        }else{
                                            $amount = $ebill->amount;
                                            $totalEbills = $totalEbills + $amount;   
                                        }
                                    }
                                }
                                

                                foreach($company->bills as $bill){
                                    $amount = $bill->amount / $bill->rate;
                                    $totalBills = $totalBills + $amount;
                                }
                            @endphp
                            <tr>
                                <td>
                                    {{$company->abbreviation}}
                                </td>
                                <td>{{ number_format($totalBills,2, '.', ',') }} USD</td>
                                <td>{{ number_format($totalEbills,2, '.', ',') }} USD</td>
                                <td>{{ number_format($totalBills - $totalEbills,2, '.', ',') }} USD</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>

        <div style="width:33.33%;">
            <div class="card ml-1 mr-1 mb-2">
                <div class="card-body d-flex justify-content-center">
                <table class="table table-bordered table-striped" style="width:100%;">
                    <thead>
                        <th colspan="4" class="text-center">
                            Vendedores
                        </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Vendedor</strong></td>
                            <td><strong>Debe</strong></td>
                            <td><strong>Haber</strong></td>
                            <td><strong>Saldo</strong></td>
                        </tr>
                        @foreach($sellers as $seller)
                            @php
                                $totalBills = 0;
                                $totalEbills = 0;

                                foreach($seller->bills as $bill){
                                    $amount = $bill->amount / $bill->rate;
                                    $totalBills = $totalBills + $amount;
                                }

                                foreach($seller->ebills as $ebill){
                                    if($ebill->currency == 'Bolívares'){
                                        $amount = $ebill->amount / $ebill->rate;
                                        $totalEbills = $totalEbills + $amount;   
                                    }else{
                                        $amount = $ebill->amount;
                                        $totalEbills = $totalEbills + $amount;   
                                    }
                                }
                            @endphp
                            <tr>
                                <td>
                                    {{$seller->name}}
                                </td>
                                <td>{{ number_format($totalBills,2, '.', ',') }} USD</td>
                                <td>{{ number_format($totalEbills,2, '.', ',') }} USD</td>
                                <td>{{ number_format($totalBills - $totalEbills,2, '.', ',') }} USD</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>



    </div>
</div>
@endsection