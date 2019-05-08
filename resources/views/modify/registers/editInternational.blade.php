@extends('layouts.interface')
@section('content')
<div class="container">
<br>
  <div class="row">
    <div class="col-md-12">
    <div class="card">
         <div class="card-header">
         Editar Registro
         </div>
        <div class="card-body">
        <form action="/update/register/international/{{$register->id}}" method="post">
        @csrf
          <div class="row">

            <div class="col-md-3 form-group">
              <label for="amount">Monto</label>
              <input type="hidden" name="bank1" value="{{$register->account->number}}">
              <input type="number" name="amount" id="amount" value="{{$register->amount}}" class="form-control min-0" min="0" step="any">
              <span><strong id="MontoFormateado">{{number_format($register->amount, 2, '.', ',')}} USD</strong></span>
            </div>

            <div class="col-md-3 form-group">
              <label for="beneficiary">Beneficiario</label>
              <select name="beneficiary" id="beneficiary" class="form-control select2">
              <option value="{{$register->beneficiary}}">{{$register->beneficiary}}</option>
              @foreach($registers->unique('beneficiary') as $r)
                <option value="{{$r->beneficiary}}">{{$r->beneficiary}}</option>
              @endforeach
              </select>
            </div>

            <div class="col-md-3 form-group">
              <label for="contable">Cuenta Contable</label>
              <select name="contable" id="contable" class="form-control select2">
              <option value="{{$register->contable}}">{{$register->contable}}</option>
              @foreach($registers->unique('contable') as $r)
                <option value="{{$r->contable}}">{{$r->contable}}</option>
              @endforeach
              </select>
            </div>

            <div class="col-md-3 form-group">
              <label for="responsable">Responsable</label>
              <select name="responsable" id="responsable" class="form-control select2">
                  <option value="{{$register->responsable}}">{{$register->responsable}}</option>
              @foreach($registers->unique('responsable') as $r)
                <option value="{{$r->responsable}}">{{$r->responsable}}</option>
              @endforeach
              </select>
            </div>

            <div class="col-md-3 form-group">
              <label for="reason">Motivo</label>
              <select name="reason" id="reason" class="form-control select2">
              <option value="{{$register->reason}}">{{$register->reason}}</option>
              @foreach($registers->unique('reason') as $r)
                <option value="{{$r->reason}}">{{$r->reason}}</option>
              @endforeach
              </select>
            </div>
            
            <div class="col-md-3 form-group">
              <label for="observation">Observaciones</label>
              <input type="text" value="{{$register->description}}" name="observation" id="observation" class="form-control">
            </div>
        </div>

          <div class="row">
            <div class="col-md-3">
              <input type="submit" value="Editar" class="btn btn-primary">
            </div>
          </div>
      </form>
    </div>
  </div>
</div>
@include('alert.modal')

@endsection
