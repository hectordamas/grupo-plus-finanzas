@extends('layouts.interface')
@section('content')
<div class="container">
  <div class="row mt-5">
    <a href="javascript:history.back();" style="color:white;"><i class="fas fa-arrow-left"></i> Volver Atrás</a>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          Verificar
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <form action="/registers/{{$register->id}}" method="post">
                @csrf
                @method('PATCH')
                <table class="table">
                  <tbody>
                    <tr>
                      <td><strong>Empresa:</strong></td>
                      <td>{{ $register->account->company->name }}</td>
                    </tr>
                    <tr>
                      <td><strong>Banco:</strong></td>
                      <td>{{ $register->account->bank->name }}</td>
                    </tr>
                    <tr>
                      <td><strong>N° de Cuenta:</strong></td>
                      <td>{{ $register->account->number }}</td>
                    </tr>
                    <tr>
                      <td><strong>Fecha:</strong></td>
                      <td>{{ date_format(new Datetime($register->date), 'd/m/Y') }}</td>
                    </tr>
                    <tr>
                      <td><strong>Beneficiario | Acreedor:</strong></td>
                      <td>{{ $register->beneficiary }}</td>
                    </tr>
                    <tr>
                      <td><strong>Estatus:</strong></td>
                      <td>
                      @if($register->status == 'Diferido')
                          <input type="radio" name="status" id="{{$register->status}}" checked value="{{$register->status}}"> {{$register->status}}<br>
                          <input type="radio" name="status" id="Disponible" value="Disponible"> Disponible<br>
                        @elseif($register->status == 'Disponible')
                          <input type="radio" name="status" id="{{$register->status}}" checked value="{{$register->status}}"> {{$register->status}}<br>
                          <input type="radio" name="status" id="Diferido" value="Diferido"> Diferido<br>
                        @elseif($register->status == 'Pagado')
                          <input type="radio" name="status" id="{{$register->status}}" checked value="{{$register->status}}"> {{$register->status}}<br>
                          <input type="radio" name="status" id="Girado" value="Girado"> Girado<br>
                        @elseif($register->status == 'Girado')
                          <input type="radio" name="status" id="{{$register->status}}" checked value="{{$register->status}}"> {{$register->status}}<br>
                          <input type="radio" name="status" id="Pagado" value="Pagado"> Pagado<br>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td><strong>Monto:</strong></td>
                      <td>{{ number_format($register->amount, 2, '.', ',') }}
                        @if($register->account->bank->type == "Banco Internacional")
                          USD
                        @else
                          Bs.S
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td><strong>Tasa:</strong></td>
                      <td>{{ number_format($register->rate, 2, ',', '.') }} Bs.S</td>
                    </tr>
                    <tr>
                      <td><strong>Observaciones:</strong></td>
                      <td>{{ $register->description }}</td>
                    </tr>
                    <tr>
                      <td><strong>Verificado:</strong> </td>
                    @if($register->verify == "Verificado")
                      <td><input type="checkbox" name="verify" id="verify" value="Verificado" checked onclick="return false;"></td>
                    @else
                      <td><input type="checkbox" name="verify" id="verify" value="Verificado" onclick="return false;"></td>
                    @endif
                    </tr>
                    <tr>
                      <td colspan="2" class="update">
                        <input type="submit" value="Actualizar" class="btn btn-primary">
                      </td>
                    </tr>
                  </tbody>
                </table>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('alert.modal')

@endsection
