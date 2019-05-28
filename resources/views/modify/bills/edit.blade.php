@extends('layouts.interface')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Facturación
                </div>
                <div class="card-body">
                    <form action="/bills/{{$bill->id}}" method="post" id="BillForm">
                    @method('PATCH')    
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="type">
                                    Tipo de Documento
                                </label>
                                <select id="type" name="type" class="form-control">
                                    <option value="{{$bill->type}}">{{$bill->type}}</option>
                                    <option value="N.E">N.E.</option>
                                    <option value="FAC">FAC</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="client">
                                    Cliente
                                </label>
                                <div class="row ml-1">
                                    <select id="client" name="client" class="form-control rounded-0">
                                        <option value="{{$bill->client->id}}">{{$bill->client->name}} - {{$bill->client->rif}}</option>
                                        @foreach($clients as $client)
                                        <option value="{{$client->id}}">{{$client->name}} - {{$client->rif}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="date">
                                 Fecha
                                </label>
                                <input type="date" id="date" name="date" class="form-control" value="{{ date_format(new DateTime($bill->date), 'Y-m-d') }}"/>
                            </div>
                            <div class="col-md-3">
                                <label for="amount">
                                    Monto
                                </label>
                                <input type="number" step="any" class="form-control" id="amountBill" name="amount" value="{{$bill->amount}}"/>
                                <strong id="amountStrong">{{number_format($bill->amount, 2, '.', ',')}}</strong>
                            </div>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-3">
                                <label for="rate">
                                 Tasa
                                </label>
                                <input type="number" id="rateBill" name="rate" step="any" class="form-control" value="{{$bill->rate}}"/>
                                <strong id="rateStrong">{{number_format($bill->rate, 2, '.', ',')}}</strong>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="number">
                                 Número
                                </label>
                                <input type="text" id="number" name="number" class="form-control" value="{{$bill->number}}"/>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="seller">
                                 Vendedor
                                </label>
                                <select id="seller" name="seller" class="form-control" required>
                                    <option value="{{$bill->seller->id}}">{{$bill->seller->name}}</option>
                                    @foreach($sellers as $seller)
                                    <option value="{{$seller->id}}">{{$seller->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="company">
                                 Empresa
                                </label>
                                <select id="company" name="company" class="form-control" required>
                                    <option value="{{$bill->company->id}}">{{$bill->company->name}}</option>
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-primary" value="Crear" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('alert.modal')
@endsection