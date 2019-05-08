@extends('layouts.interface')
@section('content')
<div class="container">
    <br>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Editar Registro
            </div>
            <div class="card-body">
            <form method="post" action="/update/register/{{$register->id}}">
            @csrf
            <div>
              <div class="row">
                <div class="form-group col-md-4">
                  <label for="Monto">
                    <strong>Monto</strong>
                  </label>
                  <input value="{{$register->amount}}" id="Monto" type="number" class="form-control" name="Monto" min="0" step="any"/>
                  <span>
                    <strong id="MontoFormateado">
                        {{number_format($register->amount, 2, '.', ',' )}}
                        @if($register->account->bank->type == 'Banco Nacional')
                            Bs.S
                        @else
                            USD
                        @endif
                    </strong>
                 </span>
                </div>
                <div class="form-group col-md-4">
                  <label for="Beneficiario">
                    <strong>Beneficiario | Acreedor</strong>
                  </label>
                  <input id="Beneficiario" type="text" class="form-control" value="{{$register->beneficiary}}" name="Beneficiario"/>
                </div>
                <div class="form-group col-md-4">
                  <label for="TASA">
                    <strong>Tasa</strong>
                  </label>
                  <input type="hidden" name="bank1" value="{{$register->account->number}}">
                  <input id="TASA" type="number" class="form-control" name="TASA" min="0" value="{{$register->rate}}" step="any"/>
                  <span id="TASASpan">
                    {{number_format($register->rate, 2, '.', ',' )}} Bs.S
                  </span>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-4">
                  <label for="CuentaContable">
                    <strong>Cuenta Contable</strong>
                  </label>
                  <select id="CuentaContable" class="form-control select2" name="CuentaContable" required>
                    <option value="{{$register->contable}}">{{$register->contable}}</option>
                  @foreach($contables as $c)
                    <option value="{{$c->name}} - {{$c->description}}">{{$c->name}} - {{$c->description}}</option>
                  @endforeach
                  </select>
                </div>


                <div class="form-group col-md-4">
                  <label for="Observaciones">
                    <strong>Observaciones</strong>
                  </label>
                  <input id="Observaciones" class="form-control" name="Observaciones" value="{{$register->description}}" required/>
                </div>

                <div class="form-group col-md-4">
                  <label for="Motivo">
                    <strong>Motivo</strong>
                  </label>
                  <select id="Motivo" class="form-control select2" name="Motivo" required>
                  <option value="{{$register->reason}}">{{$register->reason}}</option>
                  @foreach($registers->unique('reason') as $r)
                    <option value="{{$r->reason}}">{{$r->reason}}</option>
                  @endforeach
                  </select>
                </div>

              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-4">
                <input type="submit" value="Editar" class="btn btn-primary">
              </div>
            </div>
          </form>
            </div>
        </div>
    </div>
</div>
@endsection