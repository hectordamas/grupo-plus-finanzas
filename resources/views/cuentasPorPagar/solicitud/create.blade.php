@extends('layouts.interface')
@section('content')
<div class="container">
<br>
    <div class="row">
        <a href="/cuentas-por-pagar" style="color:white;"><i class="fas fa-arrow-left"></i> Volver Atrás</a>
    </div>
    <br>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Crear Solicitud
            </div>
            <div class="card-body">

         <form action="/demands" method="POST" id="CrearSolicitud">
             @csrf
            <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="deparmento">
                                Departamento
                            </label>
                            <select required id="departamento" name="departamento" class="form-control select2">
                                <option value=""></option>
                                @foreach($demands->unique('departamento') as $demand)
                                <option value="{{$demand->departamento}}">{{$demand->departamento}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="empresa">
                                Empresa
                            </label>
                            <select id="empresa" name="empresa" class="form-control">
                            @foreach($companies as $company)
                            <option value="{{$company->id}}"> {{$company->name}} </option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="currentDate">
                            Fecha de Solicitud
                        </label>
                        <input type="date" name="currentDate" value="{{ date('Y-m-d') }}" id="currentDate" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="">
                            Fecha de Pago
                        </label>
                        <input type="date" name="payDate" required id="payDate" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="beneficiary">
                            Beneficiario | Proveedor
                        </label>
                        <div class="d-flex">
                            <select type="text" name="beneficiary" readonly id="beneficiary" class="form-control mr-2">
                            </select>
                            <a href="#" class="btn btn-success rounded-0" id="Directory">Directorio</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="contable">
                            Cuenta Contable
                        </label>
                        <select required class="contable form-control select2" name="contable" value="" id="contable">
                        <option value=""></option>
                        @foreach($demands->unique('contable') as $demand)
                            <option value="{{$demand->contable}}">{{$demand->contable}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="reason">
                            Motivo
                        </label>
                        <select required class="reason form-control select2" name="reason" value="" id="reason">
                        <option value=""></option>
                        @foreach($demands->unique('reason') as $demand)
                            <option value="{{$demand->reason}}">{{$demand->reason}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="amount">
                            Amount
                        </label>
                        <input step="any" type="number" class="form-control" required oninput="formatDemandAmount(this.value)" name="amount" id="amount"/>
                        <strong id="demandAmount"></strong>
                    </div>
                    <div class="col-md-4">
                        <label for="coin">
                            Moneda
                        </label>
                        <select name="coin" id="coin" class="form-control">
                            <option value="Bs.S">Bs.S</option>
                            <option value="USD">USD</option>
                        </select>
                    </div>

                </div><!--row-->

                <div class="row">
                    <div class="form-group col-md-3">
                        <input type="submit" class="btn btn-primary" value="Crear Solicitud">
                    </div>
                </div>
            </form>

            </div>
        </div>
    </div>
</div>
@endsection