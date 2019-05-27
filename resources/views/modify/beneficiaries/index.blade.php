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
                            <th>Beneficiario</th>
                            <th>Tipo</th>
                            <th>Identificación</th>
                            <th>N° de Cuenta</th>
                            <th>Eliminar</th>
                            <th>Modificar</th>
                        </thead>
                    <tbody>
                        @foreach($beneficiaries as $beneficiary)
                        <tr>
                            <td> {{$beneficiary->name}} </td>
                            <td> {{$beneficiary->nation}} </td>
                            <td> {{$beneficiary->identification}} </td>
                            <td> {{$beneficiary->number}} </td>
                            <td>
                                <form action="/beneficiaries/{{$beneficiary->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="far fa-times-circle"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="/beneficiaries/{{$beneficiary->id}}/edit" class="btn btn-success">
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