@extends('layouts.interface')
@section('content')
<div class="container" style="margin-top:30px;">

  <div class="row">
    <a href="/bancos-internacionales" style="color:white;"><i class="fas fa-arrow-left"></i> Volver Atrás</a>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Reportes | Bancos Internacionales
        </div>
        <div class="card-body">
          <form action="/report/international" method="post">
            @csrf
            <div class="row">
              <div class="form-group col-md-3">
                <label for="desde"><strong>Desde:</strong></label>
                <input type="date" id="desde" name="desde" class="form-control" value="2019-01-01"/>
              </div>
              <div class="form-group col-md-3">
                <label for="hasta"><strong>Hasta:</strong></label>
                <input type="date" id="hasta" name="hasta" class="form-control" value="{{ date('Y-m-d') }}"/>
              </div>
              <div class="form-group col-md-3">
                <label for="company"><strong>Buscar por Empresas</strong></label>
                <select id="company" name="empresas" class="form-control">
                  <option value=""></option>
                  @foreach($companies as $company)
                  <option value="{{$company->name}}">{{$company->name}}</option>
                  @endforeach
                <select>
              </div>
              <div class="form-group col-md-3">
                <label for="bank"><strong>Buscar por Bancos</strong></label>
                <select id="bank" name="bancos" class="form-control">
                  <option value=""></option>
                  @foreach($banks as $bank)
                  <option value="{{$bank->name}}">{{$bank->name}}</option>
                  @endforeach
                <select>
              </div>
          </div>

          <div class="row">
            <div class="form-group col-md-3">
              <label for="type"><strong>Tipo de Operación</strong></label>
              <select id="type" name="type" class="form-control">
                <option value=""></option>
                <option value="Ingreso">Ingreso</option>
                <option value="Egreso">Egreso</option>
              <select>
            </div>
            <div class="form-group col-md-3">
              <label for="beneficiarios"><strong>Buscar por Beneficiarios</strong></label>
              <select type="text" id="beneficiarios" name="beneficiarios" class="form-control">
                <option value=""></option>
                @foreach($registers->unique('beneficiary') as $register)
                  <option value="{{$register->beneficiary}}">{{$register->beneficiary}}</option>
                @endforeach
              <select>
            </div>
            <div class="form-group col-md-3">
              <label for="montos"><strong>Buscar por Montos</strong></label>
              <input value="" type="number" id="monto" name="monto" class="form-control"/>
              <span><strong id="montoFormateado"></strong></span>
            </div>
            <div class="form-group col-md-3">
              <label for="status"><strong>Status</strong></label>
              <select type="text" name="Status" id="status" class="form-control">
                <option value=""></option>
                @foreach($registers->unique('status') as $register)
                  <option value="{{$register->status}}">{{$register->status}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-3">
              <label for="contable"><strong>Cuenta Contable</strong></label>
              <select type="text" id="contable" name="contable" class="form-control">
              <option value=""></option>
              @foreach($contables as $c)
                <option value="{{$c->name}} - {{$c->description}}">{{$c->name}} - {{$c->description}}</option>
              @endforeach
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="motivo"><strong>Motivo</strong></label>
              <select type="text" id="motivo" name="motivo" class="form-control">
              <option value=""></option>
                @foreach($registers->unique('reason') as $register)
                  <option value="{{$register->reason}}">{{$register->reason}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="responsable"><strong>Buscar por Responsable</strong></label>
              <select type="text" id="responsable" name="responsable" class="form-control">
              <option value=""></option>
                @foreach($registers->unique('responsable') as $register)
                  <option value="{{$register->responsable}}">{{$register->responsable}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="observation"><strong>Buscar por Descripción</strong></label>
              <input value="" type="text" id="observation" name="observation" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="form-group col">
              <input type="submit" class="btn btn-primary" value="Buscar..."/>
            </div>
          </div>
          </form>
      </div>
    </div>
  </div>

</div>
@endsection
