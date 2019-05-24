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
                    <form action="/bills" method="post" id="BillForm">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="type">
                                    Tipo de Documento
                                </label>
                                <select id="type" name="type" class="form-control">
                                    <option value="N.E">N.E.</option>
                                    <option value="FAC">FAC</option>

                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="client">
                                    Cliente
                                </label>
                                <div class="row ml-1">
                                    <div style="width:70%;">
                                        <select id="client" name="client" class="form-control rounded-0" required readonly>
                                        </select>
                                    </div>
                                    <div style="width:15%;">
                                        <a href="#" id="AñadirCliente" class="btn btn-success rounded-0">Añadir</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="date">
                                 Fecha
                                </label>
                                <input type="date" id="date" name="date" class="form-control" value="{{ date('Y-m-d') }}"/>
                            </div>
                            <div class="col-md-3">
                                <label for="amount">
                                    Monto
                                </label>
                                <input type="number" step="any" class="form-control" id="amountBill" name="amount" required/>
                                <strong id="amountStrong"></strong>
                            </div>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-3">
                                <label for="rate">
                                 Tasa
                                </label>
                                <input type="number" id="rateBill" name="rate" step="any" class="form-control" required/>
                                <strong id="rateStrong"></strong>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="number">
                                 Número
                                </label>
                                <input type="text" id="number" name="number" class="form-control" required/>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="seller">
                                 Vendedor
                                </label>
                                <select id="seller" name="seller" class="form-control select2" required>
                                    <option value=""></option>
                                    @foreach($sellers as $seller)
                                    <option value="{{$seller->name}}">{{$seller->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="company">
                                 Empresa
                                </label>
                                <select id="company" name="company" class="form-control" required>
                                    <option value=""></option>
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