@extends('layouts.interface')
@section('content')
<div class="container-fluid">
  <div class="row mt-5">
    <a href="/entries/home" style="color:white;"><i class="fas fa-arrow-left"></i> Volver Atrás</a>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Ingresos
        </div>
        <div class="card-body">
          <table class="table table-bordered" id="DataTable">
            <thead class="table-dark">
              <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Monto</th>
                <th>Motivo</th>
                <th>Estatus</th>
                <th>Verificar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
              @foreach($registers as $register)
              @if($register->account->bank->type == 'Banco Internacional')
                <tr>
                  <td> {{$register->id}} </td>
                  <td>{{ date_format(new Datetime($register->date), 'd/m/Y') }}</td>
                  <td>{{ number_format($register->amount,2,'.', ',') }} USD</td>
                  <td>{{ $register->reason}}</td>
                  <td>{{ $register->status }}</td>
                  <td><a href="/verify/entry/{{$register->id}}">Verificar</a></td>
                  <td>
                      <form action="/registers/{{$register->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Eliminar" class="btn btn-danger">
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
@endsection
