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
                    <form action="/bills/create" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="type">
                                    Tipo de Documento
                                </label>
                                <input type="text" id="type" name="type" class="form-control"/>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="client">
                                    Cliente
                                </label>
                                <select id="name" name="name" class="form-control select2" required>
                                <option value=""></option>
                                @foreach($bills as $bill)
                                <option value="{{$bill->client}}">{{$bill->client}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="date">
                                 Fecha
                                </label>
                                <input type="date" id="date" name="date" class="form-control"/>
                            </div>
                            <div class="col-md-3">
                                <label for="amount">
                                    Monto
                                </label>
                                <input type="number" step="any" class="form-control" id="amount" name="amount"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="number">
                                 Número
                                </label>
                                <input type="string" id="number" name="number" class="form-control"/>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="seller">
                                 Vendedor
                                </label>
                                <input type="text" id="seller" name="seller" class="form-control"/>
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