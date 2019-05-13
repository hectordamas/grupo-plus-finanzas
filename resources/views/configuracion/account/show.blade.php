@extends('layouts.interface')
@section('content')
<div class="container" style="margin-top:30px;">
  <div class="row">
    <a href="javascript:window.history.back();" style="color:white;"><i class="fas fa-arrow-left"></i> Volver Atrás</a>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Editar Cuentas | Empresas | Bancos
        </div>
        <div class="card-body">
          <form action="/accounts/{{$account->id}}" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <input type="hidden" name="company_id" value="{{$account->company->id}}">
            <input type="hidden" name="bank_id" value="{{$account->bank->id}}">
             <div class="row">
               <div class="form-group col">
                 <label for="name"><strong>Nombre de la Empresa</strong></label>
                 <input type="text" name="name" id="name" class="form-control" value="{{$account->company->name}}" />
               </div>
               <div class="form-group col">
                 <label for="abreviatura"><strong>Abreviatura</strong></label>
                 <input type="text" name="abreviatura" id="abreviatura" class="form-control" value="{{$account->company->abbreviation}}">
               </div>
               <div class="form-group col">
                 <label for="rif"><strong>RIF</strong></label>
                 <input type="text" name="rif" id="rif" class="form-control" value="{{$account->company->abbreviation}}">
               </div>
             </div>

             <div class="row">
               <div class="form-group col-md-6">
                 <label for="address"><strong>Dirección Fiscal</strong></label>
                 <input type="text" name="address" id="address" class="form-control" value="{{$account->company->address}}">
               </div>
              <div class="form-group col-md-6">
              <label for="customFile"><strong>Logo:</strong></label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile" name="image"/>
                  <label class="custom-file-label" for="customFile">Elige una Imagen</label>
               </div>
              </div>
             </div>

             <div class="row" id="hiddenBankFromCompany">
               <div class="form-group col-md-4">
                 <label for="accountNumber"><strong>Número de Cuenta</strong></label>
                 <input type="number" name="accountNumber" id="accountNumber" class="form-control" value="{{$account->number}}"/>
               </div>
               <div class="form-group col">
                 <label for="typeBank"><strong>Tipo de Banco</strong></label>
                 <select name="typeBank" id="typeBank" class="form-control">
                   <option value="{{$account->bank->type}}">{{$account->bank->type}}</option>
                   <option value="Banco Nacional">Banco Nacional</option>
                   <option value="Banco Internacional">Banco Internacional</option>
                 <select>
               </div>
               <div class="form-group col">
                 <label for="bankName"><strong>Nombre del Banco</strong></label>
                 <input type="text" name="bankName" id="bankName" class="form-control" value="{{$account->bank->name}}">
               </div>
             </div>

             <div class="row">
               <div class="form-group col">
                 <input type="submit" value="Registrar Cuenta" class="btn btn-primary">
               </div>
             </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @include('alert.modal')

</div>
@endsection
