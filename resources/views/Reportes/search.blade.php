@extends('layouts.interface')
@section('content')
<div class="container">
  <div class="row mt-5">
    <a href="/bancos-nacionales" style="color:white;"><i class="fas fa-arrow-left"></i> Volver Atrás</a>
  </div>

    <div class="card">
      <div class="card-header">
        Reportes | Bancos Nacionales
      </div>
      <div class="card-body">
        <form action="/report/national" method="post">
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
              <label for="empresas"><strong>Buscar por Empresas</strong></label>
              <select id="empresasReport" name="empresas" class="form-control">
                <option></option>
                @foreach($companies as $company)
                <option value="{{$company->name}}">{{$company->name}}</option>
                @endforeach
              <select>
            </div>
            <div class="form-group col-md-3">
              <label for="bancos"><strong>Buscar por Bancos</strong></label>
              <select id="bancosReport" name="bancos" class="form-control">
                <option></option>
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
              <option></option>
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
            <input type="number" id="monto" name="monto" class="form-control" step="any"/>
            <span><strong id="montoFormateado"></strong></span>
          </div>
          <div class="form-group col-md-3">
            <label for="status"><strong>Status</strong></label>
            <select name="Status" id="status" class="form-control">
            <option></option>
            @foreach($registers->unique('status') as $register)
                <option value="{{$register->status}}">{{$register->status}}</option>
            @endforeach
            </select>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-3">
            <label for="contable"><strong>Cuenta Contable</strong></label>
            <select id="contable" name="contable" class="form-control">
            <option></option>
            @foreach($contables as $c)
                <option value="{{$c->name}} - {{$c->description}}">{{$c->name}} - {{$c->description}}</option>
            @endforeach
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="motivo"><strong>Motivo</strong></label>
            <select id="motivo" name="motivo" class="form-control">
            <option></option>
            @foreach($registers->unique('reason') as $register)
              <option value="{{$register->reason}}">{{$register->reason}}</option>
            @endforeach
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="observation"><strong>Buscar por Descripción</strong></label>
            <input type="text" id="observation" name="observation" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-3">
            <input type="submit" class="btn btn-primary" value="Buscar..."/>
          </div>
        </div>

        </form>
      </div>
    </div>
</div>
@endsection
