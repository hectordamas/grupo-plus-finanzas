@extends('layouts.interface')
@section('content')
<div class="container" style="margin-top:30px;">
  <div class="row">
    <a href="/" style="color:white;"><i class="fas fa-arrow-left"></i> Volver Atrás</a>
  </div>

  <div class="row">

    <a href="/demands/create" class="background">
      <div class="row">
        <div class="col-md-12 text-center">
            <i class="far fa-credit-card" style="font-size:50px; color:white;"></i>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center" style="color:white;">Crear Solicitud</h2>
        </div>
      </div>
    </a>

    <a href="/registers/create" class="panel">
      <div class="row">
        <div class="col-md-12 text-center">
          <i class="fas fa-wallet" style="font-size:50px; color:white;"></i>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center" style="color:white;">Operaciones en Trásito</h2>
        </div>
      </div>
    </a>

    <a href="/registers/create" class="background">
      <div class="row">
        <div class="col-md-12 text-center">
            <i class="fas fa-money-check-alt" style="font-size:50px; color:white;"></i>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center" style="color:white;">Operaciones Por Pagar</h2>
        </div>
      </div>
    </a>

    </div>
    @include('alert.modal')
@endsection 