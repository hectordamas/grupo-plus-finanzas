@extends('layouts.interface')
@section('content')
<div class="container-fluid" style="margin-top:30px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Ingresos de Pago
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped" class="DataTables">
                                <thead>
                                    <th colspan="10">Ingresos</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Fecha</strong></td>
                                        <td><strong>Empresa</strong></td>
                                        <td><strong>Cliente</strong></td>
                                        <td><strong>Banco</strong></td>
                                        <td><strong>Ref.</strong></td>
                                        <td><strong>Monto</strong></td>
                                        <td><strong>Tasa</strong></td>
                                        <td><strong>USD</strong></td>
                                        <td><strong>Editar</strong></td>
                                        <td><strong>Eliminar</strong></td>
                                    </tr>
                                    @foreach($ebills as $ebill)
                                    <tr>
                                        <td>{{ date_format(new DateTime($ebill->date), 'd/m/Y') }}</td>
                                        <td>{{ $ebill->account->company->name }}</td>
                                        <td>{{ $ebill->client->name }}</td>
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
                                        <td>
                                            <a href="/ebills/{{$ebill->id}}/edit" class="btn btn-success">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </td>
                                        <td>
                                        <form action="/ebills/{{$ebill->id}}" method="post">
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