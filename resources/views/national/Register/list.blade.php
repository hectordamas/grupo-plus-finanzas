@extends('layouts.interface')
@section('content')
<div class="container-fluid" style="margin-top:30px;">
  <div class="row">
    <a href="/" style="color:white;"><i class="fas fa-arrow-left"></i> Volver Atrás</a>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Lista de Registros
        </div>
        <div class="card-body">
          <table class="table table-bordered" id="DataTable">
            <thead class="table-dark">
              <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Empresa</th>
                <th>Monto</th>
                <th>USD</th>
                <th>Tasa</th>
                <th>Motivo</th>
                <th>Estatus</th>
                <th>Verificar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
              @foreach($registers as $register)
                @if($register->account->bank->type == 'Banco Nacional')
                  @if($register->status == "Diferido" || $register->status == 'Girado')
                <tr>
                    <td>{{ $register->id }}</td>
                    <td>{{ date_format(new Datetime($register->date), 'd/m/Y') }}</td>
                    <td>{{ $register->account->company->name }}</td>
                    <td>
                      @if($register->type == 'Egreso')
                        <strong>
                        -
                        </strong>
                      @else
                      @endif 
                      {{ number_format($register->amount,2,'.', ',') }} Bs.S
                    </td>
                    <td>
                      @if($register->type == 'Egreso')
                        <strong>
                        -
                        </strong>
                      @else
                      @endif 
                      {{ number_format($register->amount / $register->rate,2,'.', ',') }} USD
                    </td>
                    <td>
                    {{ number_format($register->rate,2,'.', ',') }} USD
                    </td>
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
