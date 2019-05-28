@extends('layouts.interface')
@section('content')
<div class="container">
<br><br>
    <div class="row">
        <div class="col-md-12">
               <div class="card">
                    <div class="card-header">
                        Ingreso de Pagos
                    </div>
                    <div class="card-body">
                        <form action="/ebills/{{$ebill->id}}" method="post" class="row" id="BillForm">
                            @csrf
                            @method('PATCH')
                            <div class="form-group col-md-3">
                                <label for="date">Fecha</label>
                                <input type="date" name="date" id="date" value="{{ date_format(new DateTime($ebill->date),'Y-m-d') }}" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="billCompany">Empresa</label>
                                <select name="company" id="billCompany" class="form-control">
                                    <option value="{{$ebill->account->company->name}}">{{$ebill->account->company->name}}</option>
                                    @foreach($companies as $company)
                                    <option value="{{$company->name}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="client">Cliente</label>
                                <select name="client" id="client" class="form-control">
                                    <option value="{{$ebill->client->id}}">{{$ebill->client->name}} - {{$ebill->client->rif}}</option>
                                    @foreach($clients as $client)
                                    <option value="{{$client->id}}">{{$client->name}} - {{$client->rif}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="coin">Moneda</label>
                                <select name="coin" id="currency" class="form-control">
                                    <option value="{{$ebill->currency}}">{{$ebill->currency}}</option>
                                    <option value="Bolívares">Bolívares</option>
                                    <option value="Dólares">Dólares</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="billBank">Banco</label>
                                <select id="billBank" class="form-control" name="bank">

                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="observation">Referencia de Operación</label>
                                <input type="text" id="observation" name="observation" class="form-control" required value="{{$ebill->description}}"/>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="amount">
                                    Monto
                                </label>
                                <input type="number" step="any" class="form-control" id="amountBill" name="amount" value="{{$ebill->amount}}" required/>
                                <strong id="amountStrong">{{number_format($ebill->amount, 2, ',', '.')}}</strong>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="rate">
                                 Tasa
                                </label>
                                <input type="number" step="any" id="rateBill" name="rate" class="form-control" value="{{$ebill->rate}}" required/>
                                <strong id="rateStrong">{{number_format($ebill->rate, 2, ',', '.')}}</strong>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="seller">
                                 Vendedor
                                </label>
                                <select id="seller" name="seller" class="form-control select2">
                                    <option value="{{$ebill->seller->id}}">{{$ebill->seller->name}}</option>
                                    @foreach($sellers as $seller)
                                    <option value="{{$seller->id}}">{{$seller->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="submit" class="btn btn-primary" value="Registrar"/>
                            </div>
                        </form>
                    </div>
               </div>
        </div>
    </div>
</div>
@endsection