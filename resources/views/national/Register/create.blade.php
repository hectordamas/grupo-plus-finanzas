@extends('layouts.interface')
@section('content')
<div class="container">
  <div class="row mt-5">
    <a href="/bancos-nacionales" style="color:white;"><i class="fas fa-arrow-left"></i> Volver Atrás</a>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Crear Registros | Bancos Nacionales
        </div>
        <div class="card-body">

        <div class="FormIngresoYEgreso">
          <form method="post" action="/registers">
            @csrf
            <div class="row">
              <div class="form-group col-md-3">
                <label for="fecha">
                  <strong>
                    Fecha
                  </strong>
                </label>
                <input class="form-control" type="date" id="Fecha" name="fecha" value="{{ date('Y-m-d') }}">
              </div>
              <div class="form-group col-md-3">
                <label for="TipoRegistro">
                  <strong>Tipo de Operación</strong>
                </label>
                <select id="TipoRegistro" class="form-control" name="TipoRegistro">
                  <option value="Ingreso">Ingreso</option>
                  <option value="Egreso">Egreso</option>
                  <option value="Cambio de Divisa">Cambio de Divisa</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="company1">
                  <strong>
                    Empresa
                  </strong>
                </label>
                  <select class="form-control" name="company1" id="company1">
                    @foreach($companies as $company)
                    <option value="{{$company->name}}">{{$company->name}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group col-md-3">
                <label for="bank1">
                  <strong>
                    Banco
                  </strong>
                </label>
                <select class="form-control" name="bank1" id="bank1">
                </select>
              </div>
            </div>
            <div>
              <div class="row">
                <div class="form-group col-md-3">
                  <label for="Monto">
                    <strong>Monto</strong>
                  </label>
                  <input id="Monto" type="number" class="form-control" name="Monto" min="0" required step="any"/>
                  <span><strong id="MontoFormateado"></strong></span>
                </div>
                <div class="form-group col-md-3">
                  <label for="Beneficiario">
                    <strong>Beneficiario | Acreedor</strong>
                  </label>
                  <input id="Beneficiario" type="text" class="form-control" name="Beneficiario" required/>
                </div>
                <div class="form-group col-md-3">
                  <label for="TASA">
                    <strong>Tasa</strong>
                  </label>
                  <input id="TASA" type="number" class="form-control" name="TASA" min="0" required step="any"/>
                  <span id="TASASpan"></span>
                </div>
                <div class="form-group col-md-3">
                  <label for="Status">
                    <strong>Estatus</strong>
                  </label>
                  <select id="Status" class="form-control" name="Status">
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-3">
                  <label for="CuentaContable">
                    <strong>Cuenta Contable</strong>
                  </label>
                  <select id="CuentaContable" class="form-control select2" name="CuentaContable" required>
                    <option value=""></option>
                  @foreach($registers->unique('contable') as $register)
                    <option value="{{$register->contable}}">{{$register->contable}}</option>
                  @endforeach
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="Motivo">
                    <strong>Motivo</strong>
                  </label>
                  <select id="Motivo" class="form-control select2" name="Motivo" required>
                  <option value=""></option>
                  @foreach($registers->unique('reason') as $register)
                    <option value="{{$register->reason}}">{{$register->reason}}</option>
                  @endforeach
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="Observaciones">
                    <strong>Observaciones</strong>
                  </label>
                  <input id="Observaciones" class="form-control" name="Observaciones" required/>
                </div>
                <div class="form-group col-md-3" id="checkITF">
                  <label for="feed" class="form-check-label">
                    <input id="feed" type="checkbox" class="form-check-input" name="feed" value="Sí">ITF
                  </label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-3" id="colFeed">
                <label for="Feed">
                  <strong>ITF</strong>
                </label>
                <input id="Feed" class="form-control" type="number" readonly name="Feedx"/>
                <span><strong id="feedSpan"><strong></span>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-3">
                <input type="submit" value="Crear" class="btn btn-primary">
              </div>
            </div>
          </form>
          </div><!--Wrapper1-->
          <!--Segundo Formulario -->
          <!--Segundo Formulario -->
          <!--Segundo Formulario -->
          <!--Segundo Formulario -->
          <!--Segundo Formulario -->
          <!--Segundo Formulario -->
          <div class="FormCambioDivisaWrapper">
          <form action="/registers" method="post" id="Divisa">
          @csrf
          <input type="hidden" name="TipoRegistro" value="Cambio de Divisa">
          <div>
              <div class="row">
                <div class="form-group col-md-3">
                  <label for="Fecha">
                    <strong>
                      Fecha
                    </strong>
                  </label>
                  <input class="form-control" type="date" id="Fecha" name="fecha1" value="{{ date('Y-m-d') }}">
                </div>
                <div class="form-group col-md-3">
                  <label for="Cantidad">
                    <strong>Cantidad (USD)</strong>
                  </label>
                  <input type="number" id="Cantidad" class="form-control" name="Cantidad" min="0" required/>
                  <span><strong id="CantidadFormateada"></strong></span>
                </div>
                <div class="form-group col-md-3">
                  <label for="Tasa">
                    <strong>Tasa (Bs.S)</strong>
                  </label>
                  <input type="number" id="Tasa" class="form-control" name="Tasa" min="0" required/>
                  <span><strong id="TasaFormateada"></strong></span>
                </div>
                <div class="form-group col-md-3">
                  <label for="Vendedor">
                    <strong>Vendedor</strong>
                  </label>
                  <select id="Vendedor" class="form-control select2" name="Vendedor">
                  @foreach($registers->unique('seller') as $register)
                    <option value="{{$register->seller}}">{{$register->seller}}</option>
                  @endforeach
                  </select>
                </div>
              </div>
              <div class="row">
              <div class="form-group col-md-3">
                  <label for="TotalOperacion">
                    <strong>Total Operación</strong>
                  </label>
                  <input disabled type="text" id="TotalOperacion" class="form-control" name="TotalOperacion" />
                </div>
                <div class="form-group col-md-3">
                  <label for="Responsable">
                    <strong>Responsable</strong>
                  </label>
                  <select id="Responsable" class="form-control select2" name="Responsable">
                  @foreach($registers->unique('responsable') as $register)
                    <option value="{{$register->responsable}}">{{$register->responsable}}</option>
                  @endforeach
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="BancoDestino">
                    <strong>Banco Destino</strong>
                  </label>
                  <select class="form-control" id="BancoDestino" name="BancoDestino" required>
                    <option value=""></option>
                    @foreach($accounts as $account)
                      @if($account->bank->type == "Banco Internacional")
                        <option value="{{$account->number}}">{{$account->bank->name}} - {{$account->company->name}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="Concepto">
                    <strong>Concepto</strong>
                  </label>
                  <select id="Concepto" class="form-control select2" name="Concepto">
                  @foreach($registers->unique('concept') as $register)
                    <option value="{{$register->concept}}">{{$register->concept}}</option>
                  @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="CantidadDeTransacciones">
              <div class="row">
                <div class="form-group col-md-3">
                  <label for="CantidadDeTransacciones">
                    <strong>Cantidad De Transacciones</strong>
                  </label>
                  <input id="CantidadDeTransacciones" type="number" min="0" class="form-control" name="CantidadDeTransacciones" />
                </div>

                <div class="col-md-3 d-flex align-items-center">
                  <a href="#" class="btn btn-dark rounded-0" id="calculator">Calculadora</a>
                </div>
              </div>
            </div>
            <div class="Transacciones">

            </div>
            <div class="row">
              <div class="form-group col-md-3">
                <input type="submit" value="Crear" class="btn btn-primary">
              </div>
            </div>
          </form>
          </div><!--WRAPPERRRRRRRRR!!!!!!-->



        </div>
      </div>
    </div>
  </div>
</div>
@include('alert.modal')
@endsection
