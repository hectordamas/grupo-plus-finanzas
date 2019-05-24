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
                        <form action="/ebills" method="post" class="row" id="BillForm">
                            @csrf
                            <div class="form-group col-md-3">
                                <label for="date">Fecha</label>
                                <input type="date" name="date" id="date" value="{{ date('Y-m-d') }}" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="billCompany">Empresa</label>
                                <select name="company" id="billCompany" class="form-control">
                                    @foreach($companies as $company)
                                    <option value="{{$company->name}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="client">Cliente</label>
                                <select name="client" id="client" class="form-control" required>
                                    <option value=""></option>
                                    @foreach($clients as $client)
                                    <option value="{{$client->id}}">{{$client->name}} - {{$client->rif}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="coin">Moneda</label>
                                <select name="coin" id="currency" class="form-control" required>
                                    <option value="Bolívares">Bolívares</option>
                                    <option value="Dólares">Dólares</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="billBank">Banco</label>
                                <select id="billBank" class="form-control" name="bank" required>

                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="observation">Referencia de Operación</label>
                                <input type="text" id="observation" name="observation" class="form-control" required/>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="amount">
                                    Monto
                                </label>
                                <input type="number" step="any" class="form-control" id="amountBill" name="amount" required/>
                                <strong id="amountStrong"></strong>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="rate">
                                 Tasa
                                </label>
                                <input type="number" step="any" id="rateBill" name="rate" class="form-control" required/>
                                <strong id="rateStrong"></strong>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="billNumber">
                                    Número de Factura
                                </label>
                                <select id="billNumber" name="billNumber" class="form-control select2" required>
                                    <option value=""></option>
                                    @foreach($bills->unique('number') as $bill)
                                    <option value="{{$bill->number}}">{{$bill->number}}</option>
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