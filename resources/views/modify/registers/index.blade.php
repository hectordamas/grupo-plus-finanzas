@extends('layouts.interface')
@section('content')
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Modificar Registros
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="DataTable">
                        <thead class="table-dark">
                          <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Empresa</th>
                            <th>Banco</th>
                            <th>Tipo</th>
                            <th>Monto</th>
                            <th>Motivo</th>
                            <th>Estatus</th>
                            <th>Última Modificación</th>
                            <th>Modificado Por:</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($registers as $register)
                            @if($register->account->bank->type == 'Banco Nacional')
                            <tr>
                                <td>{{ $register->id }}</td>
                                <td>{{ date_format(new Datetime($register->date), 'd/m/Y') }}</td>
                                <td>{{ $register->account->company->name }}</td>
                                <td>{{ $register->account->bank->name }}</td>
                                <td> {{$register->type}} </td>
                                <td>
                                  {{ number_format($register->amount,2,'.', ',') }} 
                                @if($register->account->bank->type == 'Banco Nacional')
                                    Bs.S
                                @else
                                    USD
                                @endif
                                </td>
                                <td>{{ $register->reason}}</td>
                                <td>{{ $register->status }}</td>
                                <td>
                                    {{date_format($register->updated_at, 'd/m/Y')}}
                                </td>
                                <td>
                                  {{$register->modify_by}}
                                </td>
                                <td class="d-flex justify-content-center"> 
                                    <a href="/edit/register/{{$register->id}}" class="btn btn-success">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                </td>
                                <td>
                                  <form action="/registers/{{$register->id}}" class="d-flex justify-content-center" method="post">
                                  @csrf
                                  @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="far fa-times-circle"></i>
                                    </button>
                                  </form>
                                </td>
                            </tr>
                            @endif
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