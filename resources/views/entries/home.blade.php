@extends('layouts.interface')
@section('content')
<div class="container">

  <div class="row mt-5">
    <a href="/bancos-internacionales" style="color:white;"><i class="fas fa-arrow-left"></i> Volver Atrás</a>
  </div>

  <div class="row">
    <a href="/entries/create" class="panel" style="width:20rem; padding:50px 0; background:#51AFE1; margin:5px;">
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

    <a href="/entries" class="panel" style="width:20rem; padding:50px 0; background:#24426f; margin:5px;">
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
