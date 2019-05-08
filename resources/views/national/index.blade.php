@extends('layouts.interface')
@section('content')
<div class="container" style="margin-top:30px;">
  <div class="row">
  </div>

  <div class="row">

    <a href="/registers/create" class="panel background" style="width:20rem; padding:50px 0; background:#24426f; margin:5px;">
      <div class="row">
        <div class="col-md-12 text-center">
          <i class="fas fa-cash-register" style="font-size:50px; color:white;"></i>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center" style="color:white;">Crear Registros</h2>
        </div>
      </div>
    </a>

    <a href="/registers/list/index" class="panel" style="width:20rem; padding:50px 0; background:#51AFE1; margin:5px;" >
      <div class="row">
        <div class="col-md-12 text-center">
          <i class="fas fa-cash-register" style="font-size:50px; color:white;"></i>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center" style="color:white;">Verificar Registros</h2>
        </div>
      </div>
    </a>

    <a href="/registers" class="background">
      <div class="row">
        <div class="col-md-12 text-center">
          <i class="fas fa-balance-scale" style="font-size:50px; color:white;"></i>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center" style="color:white;">Saldos</h2>
        </div>
      </div>
    </a>


    <a href="/reportes" class="panel" style="width:20rem; padding:50px 0; background:#51AFE1; margin:5px;">
      <div class="row">
        <div class="col-md-12 text-center">
          <i class="fas fa-file-invoice" style="font-size:50px; color:white;"></i>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center" style="color:white;">Reportes</h2>
        </div>
      </div>
    </a>

    <a href="/all/registers" class="background">
      <div class="row">
        <div class="col-md-12 text-center">
          <i class="fas fa-pen" style="font-size:50px; color:white;"></i>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center" style="color:white;">Modificar Registros</h2>
        </div>
      </div>
    </a>

  </div>
</div>
@include('alert.modal')
@endsection
