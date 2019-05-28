@extends('layouts.interface')
@section('content')
<div class="container-fluid" style="margin-top:30px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Reportes | Facturación
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped" class="DataTables">
                                <thead>
                                    <th colspan="9">Facturas</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Tipo</strong></td>
                                        <td><strong>Cliente</strong></td>
                                        <td><strong>Fecha</strong></td>
                                        <td><strong>Monto</strong></td>
                                        <td><strong>Tasa</strong></td>
                                        <td><strong>USD</strong></td>
                                        <td><strong>Número</strong></td>
                                        <td><strong>Vendedor</strong></td>
                                        <td><strong>Empresa</strong></td>
                                    </tr>
                                    @foreach($bills as $bill)
                                    <tr>
                                        <td>{{$bill->type}}</td>
                                        <td>{{$bill->client->name}}</td>
                                        <td>{{ date_format(new DateTime($bill->date), 'd/m/Y') }}</td>
                                        <td>{{ number_format($bill->amount, 2, '.', ',') }} Bs.S</td>
                                        <td>{{ number_format($bill->rate, 2, '.', ',') }} Bs.S</td>
                                        <td>{{ number_format($bill->amount / $bill->rate, 2, '.', ',') }} USD</td>
                                        <td>{{ $bill->number }}</td>
                                        <td>{{ $bill->seller->name }}</td>
                                        <td>{{ $bill->company->name }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped" class="DataTables">
                                <thead>
                                    <th colspan="8">Ingresos</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Fecha</strong></td>
                                        <td><strong>Empresa</strong></td>
                                        <td><strong>Cliente</strong></td>
                                        <td><strong>Vendedor</strong></td>
                                        <td><strong>Banco</strong></td>
                                        <td><strong>Ref.</strong></td>
                                        <td><strong>Monto</strong></td>
                                        <td><strong>Tasa</strong></td>
                                        <td><strong>USD</strong></td>
                                    </tr>
                                    @foreach($ebills as $ebill)
                                    <tr>
                                        <td>{{ date_format(new DateTime($ebill->date), 'd/m/Y') }}</td>
                                        <td>{{ $ebill->account->company->name }}</td>
                                        <td>{{ $ebill->client->name }}</td>
                                        <td>{{ $ebill->seller->name }}</td>
                                        <td>{{ $ebill->account->bank->name }}</td>
                                        <td>{{ $ebill->description }}</td>
                                        <td> 
                                            {{ number_format($ebill->amount, 2, '.', ',') }} 
                                            @if($ebill->currency == 'Bolívares')
                                                Bs.S
                                            @else
                                                USD
                                            @endif
                                        </td>
                                        <td> {{ number_format($ebill->rate, 2, '.', ',') }} Bs.S</td>
                                        <td>
                                            @if($ebill->currency == 'Bolívares')
                                                {{ number_format($ebill->amount / $ebill->rate, 2, '.', ',') }} USD
                                            @else
                                                {{ number_format($ebill->amount / $ebill->rate, 2, '.', ',') }} Bs.S
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Totales
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div style="width:50%;">
                                <table class="table table-bordered">
                                    <thead>
                                        <th colspan="2">
                                            Total Facturado
                                        </th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>USD</strong></td>
                                            <td><strong>Bs.S</strong></td>
                                        </tr>
                                        <tr>
                                            <td>{{ number_format($totalUSDBills, 2, '.', ',') }} USD</td>
                                            <td>{{ number_format($totalBills, 2, '.', ',') }} Bs.S</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div style="width:50%;">
                                <table class="table table-bordered">
                                    <thead>
                                        <th colspan="2">
                                            Total Ingresos
                                        </th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>USD</strong></td>
                                            <td><strong>Bs.S</strong></td>
                                        </tr>
                                        <tr>
                                            <td>{{ number_format($totalUSDEbills, 2, '.', ',') }} USD</td>
                                            <td>{{ number_format($totalEbills, 2, '.', ',') }} Bs.S</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection