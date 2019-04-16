@extends('layouts.interface')
@section('content')
<div class="container-fluid">
    <br>
    <div class="row">
        <a href="/cuentas-por-pagar" style="color:white;"><i class="fas fa-arrow-left"></i> Volver Atrás</a>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Operaciones por Pagar
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="DataTable">
                        <thead class="table-dark">
                            <th>#</th>
                            <th>Dpto.</th>
                            <th>Empresa</th>
                            <th>Fecha de Solicitud</th>
                            <th>Fecha de Pago</th>
                            <th>Beneficiario | Proveedor</th>
                            <th>Cta. Contable</th>
                            <th>Motivo</th>
                            <th>Monto</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                        @foreach($demands as $demand)
                            <tr>
                                <td> {{$demand->id}} </td>
                                <td> {{$demand->departamento}} </td>
                                <td> {{$demand->company->name}} </td>
                                <td> {{ date_format(new DateTime($demand->currentDate), 'd/m/Y') }} </td>
                                <td> {{ date_format(new DateTime($demand->payDate), 'd/m/Y') }} </td>
                                <td> {{$demand->beneficiary}} </td>
                                <td> {{$demand->contable}}</td>
                                <td> {{$demand->reason}} </td>
                                <td> {{number_format($demand->amount, 2, '.', ',') }} {{$demand->coin}} </td>
                                <td> {{$demand->status}} </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<br>
    <div class="row">
    @foreach($companies as $company)
        @php
            $totalUSD = 0;
            $totalBs = 0;

            foreach($company->demands as $demand){
                if($demand == 'USD'){
                    $totalUSD = $totalUSD + $demand->amount;
                }else{
                    $totalBs = $totalBs + $demand->amount;
                }
            }
        @endphp
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Totales ({{$company->name}})
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Divisas</th>
                            <th>Bolívares</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td> {{number_format($totalUSD, 2, '.', ',')}} USD</td>
                                <td> {{number_format($totalBs, 2, '.', ',')}} Bs.git S</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
    </div><!--row-->

</div>
@endsection