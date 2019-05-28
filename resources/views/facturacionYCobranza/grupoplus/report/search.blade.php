@extends('layouts.interface')
@section('content')
<div class="container" style="margin-top:30px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Reportes | Facturación
                </div>
                <div class="card-body">
                    <form class="row" action="/search/bill" method="post">
                        @csrf
                        <div class="form-group col-md-3">
                            <label for="date">
                                Fecha
                            </label>
                            <input id="date" type="date" name="date" class="form-control"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="from">
                                Desde:
                            </label>
                            <input id="from" type="date" name="from" class="form-control"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="to">
                                Hasta:
                            </label>
                            <input id="to" type="date" name="to" class="form-control"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="client">
                                Cliente:
                            </label>
                            <select id="client" name="client" class="form-control">
                            <option value=""></option>
                                @foreach($clients as $client)
                                    <option value="{{$client->id}}">{{$client->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="seller">
                                Vendedor:
                            </label>
                            <select id="seller" name="seller" class="form-control">
                            <option value=""></option>
                                @foreach($sellers as $seller)
                                    <option value="{{$seller->id}}">{{$seller->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="company">
                                Empresas:
                            </label>
                            <select id="company" name="company" class="form-control">
                            |   <option value=""></option>
                                @foreach($companies as $company)
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" class="btn btn-primary" value="Ver Reporte">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection