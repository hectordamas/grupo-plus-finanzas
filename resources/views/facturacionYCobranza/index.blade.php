@extends('layouts.interface')
@section('content')
<div class="container" style="margin-top:30px;">
    <div class="row">

    <a href="/grupoplus" class="panel">
        <div class="row">
          <div class="col-md-12 text-center">
          <i class="fas fa-file-invoice" style="font-size:50px; color:white;"></i>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center" style="color:white;">GrupoPlus+</h2>
          </div>
        </div>
    </a>


    <a href="/tiendagf" class="background">
        <div class="row">
          <div class="col-md-12 text-center">
          <i class="fas fa-file-invoice" style="font-size:50px; color:white;"></i>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center" style="color:white;">TiendaGF</h2>
          </div>
        </div>
    </a>



    </div>
</div>
@include('alert.modal')
@endsection