@extends('layouts.interface')
@section('content')
<div class="container" style="margin-top:30px;">
  <div class="row">
    <a href="/" style="color:white;"><i class="fas fa-arrow-left"></i> Volver Atrás</a>
  </div>

  <div class="row">

    <a href="/companies" class="panel" style="width:20rem; padding:50px 0; background:#24426f; margin:5px;">
      <div class="row">
        <div class="col-md-12 text-center">
          <i class="fas fa-building" style="font-size:50px; color:white;"></i>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center" style="color:white;">Empresas</h2>
        </div>
      </div>
    </a>

    <a href="/register" class="panel" style="width:20rem; padding:50px 0; background:#51AFE1; margin:5px;">
      <div class="row">
        <div class="col-md-12 text-center">
          <i class="fas fa-users" style="font-size:50px; color:white;"></i>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center" style="color:white;">Usuarios</h2>
        </div>
      </div>
    </a>

  </div>
</div>
@endsection
