@extends('layouts.interface')
@section('content')
<div class="container">

<br><br>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Registrar Cuentas | Empresas | Bancos
        </div>
        <div class="card-body">
          <form id="Empresas" action="/companies" method="post" enctype="multipart/form-data">
            @csrf
             <div class="row">
             <div class="col-md-12">
              <h6>
                Empresa a la que deseas asociar tu cuenta:
              </h6>
              <br>
             </div>
               <div class="form-group col-md-4">
                 <label for="name"><strong>Nombre de la Empresa</strong></label>
                 <select name="name" id="nameSearchCompany" class="form-control select2">
                   @foreach($companies as $company)
                   <option value="{{$company->name}}">{{$company->name}}</option>
                   @endforeach
                 </select>
               </div>
               <div class="form-group col-md-4">
                 <label for="abreviatura"><strong>Abreviatura</strong></label>
                 <input name="abreviatura" id="abreviatura" class="form-control" required/>
               </div>
               <div class="form-group col-md-4">
                 <label for="rif"><strong>RIF</strong></label>
                 <input name="rif" id="rif" class="form-control" required maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" /> 
               </div>
             </div>

             <div class="row">
               <div class="form-group col-md-4">
                 <label for="address"><strong>Dirección Fiscal</strong></label>
                 <input name="address" id="address" class="form-control" required />
               </div>

              <div class="form-group col-md-4">
              <label for="customFile"><strong>Logo:</strong></label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile" name="image"/>
                  <label class="custom-file-label" for="customFile">Elige una Imagen</label>
               </div>
              </div>

             </div>

             <div class="row" id="hiddenBankFromCompany">
                <div class="col-md-12">
                <br>
                 <h6>
                   Banco al que deseas asociar tu cuenta:
                 </h6>
                 <br>
                </div>
               <div class="form-group col-md-4">
                 <label for="typeBank"><strong>Tipo de Banco</strong></label>
                 <select name="typeBank" id="typeBank" class="form-control">
                   <option value="Banco Nacional">Banco Nacional</option>
                   <option value="Banco Internacional">Banco Internacional</option>
                 <select>
               </div>
               <div class="form-group col-md-4">
                 <label for="bankName"><strong>Nombre del Banco</strong></label>
                 <select name="bankName" id="bankName" class="form-control select2">
                   @foreach($banks as $bank)
                     <option value="{{$bank->name}}">{{$bank->name}}</option>
                   @endforeach
                 </select>
               </div>

               <div class="form-group col-md-4">
                 <label for="accountNumber"><strong>Número de Cuenta</strong></label>
                 <input type="number" name="number" required id="accountNumber" class="form-control" maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
                 @if($errors->first('number'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('number') }}</strong>
                  </span>
                  <br>
                  <span class="invalid-feedback" role="alert">
                      <strong>Recuerda que cada empresa debe tener un solo número de cuenta por banco.</strong>
                  </span>
                  @endif
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
</div>
@include('alert.modal')
@endsection
