@extends('layouts.interface')
@section('content')
<div class="container">

  <div class="row mt-5">
  </div>

  <div class="row">
    <a href="/entries/create" class="panel">
      <div class="row">
        <div class="col-md-12 text-center">
          <i class="fas fa-users" style="font-size:50px; color:white;"></i>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center" style="color:white;">Registrar Ingreso</h2>
        </div>
      </div>
    </a>

    <a href="/entries" class="background">
      <div class="row">
        <div class="col-md-12 text-center">
          <i class="fas fa-building" style="font-size:50px; color:white;"></i>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center" style="color:white;">Verificar Ingresos</h2>
        </div>
      </div>
    </a>
  </div>

  @include('alert.modal')
</div>
@endsection
