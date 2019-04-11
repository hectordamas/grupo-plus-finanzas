@extends('layouts.interface')
@section('content')
<div class="container" style="margin-top:30px;">
  <div class="row">
    <a href="/" style="color:white;"><i class="fas fa-arrow-left"></i> Volver Atrás</a>
  </div>
  <div class="row">

    <a href="/entries/home" class="panel" style="width:20rem; padding:50px 0; background:#24426f; margin:5px;">
      <div class="row">
        <div class="col-md-12 text-center">
          <i class="fas fa-balance-scale" style="font-size:50px; color:white;"></i>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center" style="color:white;">Ingresos</h2>
        </div>
      </div>
    </a>

    <a href="/expenses/create" class="panel" style="width:20rem; padding:50px 0; background:#51AFE1; margin:5px;">
      <div class="row">
        <div class="col-md-12 text-center">
          <i class="fas fa-cash-register" style="font-size:50px; color:white;"></i>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center" style="color:white;">Egresos</h2>
        </div>
      </div>
    </a>

    <a href="/saldos" class="panel" style="width:20rem; padding:50px 0; background:#24426f; margin:5px;">
      <div class="row">
        <div class="col-md-12 text-center">
          <i class="fas fa-file-invoice" style="font-size:50px; color:white;"></i>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center" style="color:white;">Saldos</h2>
        </div>
      </div>
    </a>

    <a href="/reportes/internacionales" class="panel" style="width:20rem; padding:50px 0; background:#51AFE1; margin:5px;">
      <div class="row">
        <div class="col-md-12 text-center">
          <i class="fas fa-money-check-alt" style="font-size:50px; color:white;"></i>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center" style="color:white;">Reportes</h2>
        </div>
      </div>
    </a>

  </div>
</div>
@endsection
