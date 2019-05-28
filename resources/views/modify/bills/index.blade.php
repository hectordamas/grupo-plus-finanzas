@extends('layouts.interface')
@section('content')
<div class="container-fluid" style="margin-top:30px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Facturación
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped" class="DataTables">
                                <thead>
                                    <th colspan="11">Facturas</th>
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
                                        <td><strong>Editar</strong></td>
                                        <td><strong>Eliminar</strong></td>
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
                                        <td>
                                            <a href="/bills/{{$bill->id}}/edit" class="btn btn-success">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </td>
                                        <td>
                                        <form action="/bills/{{$bill->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="far fa-times-circle"></i>
                                            </button>
                                        </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('alert.modal')
@endsection