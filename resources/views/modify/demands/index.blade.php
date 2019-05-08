@extends('layouts.interface')
@section('content')
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Modificar Solicitudes
                </div>
                <div class="card-body">
                <table class="table table-striped table-bordered" id="DataTable" width="100%">
                        <thead class="table-dark">
                            <th>#</th>
                            <th>Dpto.</th>
                            <th>Emp.</th>
                            <th>Fecha de Solicitud</th>
                            <th>Fecha de Pago</th>
                            <th>Beneficiario | Proveedor</th>
                            <th>Cta. Contable</th>
                            <th>Motivo</th>
                            <th>Monto</th>
                            <th>Estatus</th>
                            <th>Última Modificación</th>
                            <th>Modificado Por:</th>
                            <th>Modificar</th>
                        </thead>
                        <tbody>
                        @foreach($demands as $demand)
                            <tr>
                                <td> {{$demand->id}} </td>
                                <td> {{$demand->departamento}} </td>
                                <td> {{$demand->company->name}} </td>
                                <td> {{ date_format(new DateTime($demand->currentDate), 'd/m/Y') }} </td>
                                <td> {{ date_format(new DateTime($demand->payDate), 'd/m/Y') }} </td>
                                <td> <a href="#" data-id="{{$demand->beneficiary->id}}" class="beneficiary-modal">{{$demand->beneficiary->name}}</a> </td>
                                <td> {{$demand->contable}}</td>
                                <td> {{$demand->reason}} </td>
                                <td> {{number_format($demand->amount, 2, '.', ',') }} {{$demand->coin}} </td>
                                <td> {{$demand->status}} </td>
                                <td>
                                    {{date_format($demand->updated_at, 'd/m/Y')}}
                                </td>
                                <td>
                                  {{$demand->modify_by}}
                                </td>
                                <td> 
                                    <a href="/edit/demand/{{$demand->id}}" class="btn btn-success">
                                        <i class="fas fa-pen"></i>
                                    </a>
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
@include('alert.modal')
@endsection