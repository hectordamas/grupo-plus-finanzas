@extends('layouts.interface')
@section('content')
<br>
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Crear Solicitud
            </div>
            <div class="card-body">

         <form action="/update/demand/{{$demand->id}}" method="POST" id="CrearSolicitud">
             @csrf
            <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="deparmento">
                                Departamento
                            </label>
                            <select id="departamento" name="departamento" class="form-control select2">
                                <option value="{{$demand->departamento}}">{{$demand->departamento}}</option>
                                @foreach($demands->unique('departamento') as $d)
                                <option value="{{$d->departamento}}">{{$d->departamento}}</option>
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
                            <option value="{{$demand->company->id}}"> {{$demand->company->name}} </option>
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
                        <input type="date" name="currentDate" value="{{ date_format(new DateTime($demand->currentDate),'Y-m-d') }}" id="currentDate" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="">
                            Fecha de Pago
                        </label>
                        <input type="date" value="{{ date_format(new DateTime($demand->payDate),'Y-m-d') }}" name="payDate" required id="payDate" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="beneficiary">
                            Beneficiario | Proveedor
                        </label>
                        <div class="d-flex">
                            <select type="text" name="beneficiary" readonly id="beneficiary" class="form-control mr-2">
                                <option value="{{$demand->beneficiary->id}}">{{$demand->beneficiary->name}}</option>
                            </select>
                            <a href="#" class="btn btn-success rounded-0" id="Directory">Directorio</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="contable">
                            Cuenta Contable
                        </label>
                        <select class="contable form-control select2" name="contable" value="" id="contable">
                        <option value="{{$demand->contable}}">{{$demand->contable}}</option>
                        @foreach($contables as $contable)
                            <option value="{{$contable->name}} - {{$contable->description}}">{{$contable->name}} - {{$contable->description}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="reason">
                            Motivo
                        </label>
                        <select class="reason form-control select2" name="reason" id="reason">
                        <option value="{{$demand->reason}}">{{$demand->reason}}</option>
                        @foreach($demands->unique('reason') as $d)
                            <option value="{{$d->reason}}">{{$d->reason}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="amount">
                            Monto
                        </label>
                        <input step="any" value="{{$demand->amount}}" type="number" class="form-control" required oninput="formatDemandAmount(this.value)" name="amount" id="amount"/>
                        <strong id="demandAmount">{{number_format($demand->amount, 2, '.', ',')}}</strong>
                    </div>
                    <div class="col-md-4">
                        <label for="coin">
                            Moneda
                        </label>
                        <select name="coin" id="coin" class="form-control">
                            @if($demand->coin == 'Bs.S')
                            <option value="Bs.S">Bs.S</option>
                            <option value="USD">USD</option>             
                            @else
                            <option value="USD">USD</option>
                            <option value="Bs.S">Bs.S</option>
                            @endif
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