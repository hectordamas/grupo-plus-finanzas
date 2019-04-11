@extends('layouts.interface')
@section('content')
<div class="container">
  <div class="row mt-5">
    <a href="/bancos-internacionales" style="color:white;"><i class="fas fa-arrow-left"></i> Volver Atrás</a>
  </div>
  <div class="row">
    <div class="col-md-12">
      <form class="card" action="/expenses/create" method="post">
         <div class="card-header">
           Egresos | Bancos Internacionales
         </div>
        @csrf
        <div class="card-body">
          <div class="row">
            <div class="col-md-3 form-group">
              <label for="date">Fecha</label>
              <input type="date" id="date" name="date" class="form-control" value="{{ date('Y-m-d') }}">
            </div>
            <div class="col-md-3 form-group">
              <label for="amount">Monto</label>
              <input type="number" name="amount" id="amount" class="form-control min-0" min="0" required>
              <span><strong id="MontoFormateado"></strong></span>
            </div>
            <div class="col-md-3 form-group">
              <label for="companyEntriesExpenses">Empresa</label>
              <select name="company" id="companyEntriesExpenses" class="form-control">
                  @foreach($companies as $company)
                    <option value="{{$company->name}}">{{$company->abbreviation}}</option>
                  @endforeach
              </select>
            </div>
            <div class="col-md-3 form-group">
              <label for="bankEntriesExpenses">Banco</label>
              <select name="bank" id="bankEntriesExpenses" class="form-control">
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 form-group">
              <label for="beneficiary">Beneficiario</label>
              <input type="text" name="beneficiary" id="beneficiary" class="form-control" required>
            </div>
            <div class="col-md-3 form-group">
              <label for="contableAccount">Cuenta Contable</label>
              <select name="contableAccount" id="contableAccount" class="form-control select2" required>
              @foreach($registers->unique('contable') as $register)
                <option value="{{$register->contable}}">{{$register->contable}}</option>
              @endforeach
              </select>
            </div>
            <div class="col-md-3 form-group">
              <label for="responsable">Responsable</label>
              <input type="text" name="responsable" id="responsable" class="form-control" required>
            </div>
            <div class="col-md-3 form-group">
              <label for="estatus">Estatus</label>
              <select name="estatus" id="estatus" class="form-control">
                <option value="Girado">Girado</option>
                <option value="Pagado">Pagado</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 form-group">
              <label for="observation">Observaciones</label>
              <input type="text" name="observation" id="observation" class="form-control" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3">
              <input type="submit" class="btn btn-primary">
            </div>
          </div>

        </div>
      </form>
    </div>
  </div>
</div>
@include('alert.modal')

@endsection
