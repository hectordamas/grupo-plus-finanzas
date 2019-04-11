@extends('layouts.interface')

@section('content')
  <div class="container" style="margin-top:30px;">
    <div class="row center-items">

      <a href="/bancos-nacionales" class="panel" style="width:20rem; padding:50px 0; background:#24426f; margin:5px;">
        <div class="row">
          <div class="col-md-12 text-center">
            <i class="fas fa-university" style="font-size:50px; color:white;"></i>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center" style="color:white;">Bancos Nacionales</h2>
          </div>
        </div>
      </a>


      <a href="/bancos-internacionales" class="panel" style="width:20rem; padding:50px 0; background:#51AFE1; margin:5px;">
        <div class="row">
          <div class="col-md-12 text-center">
            <i class="fas fa-money-check-alt" style="font-size:50px; color:white;"></i>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center" style="color:white;">Bancos Internacionales</h2>
          </div>
        </div>
      </a>


      <a href="/cuentas-por-pagar" class="panel" style="width:20rem; padding:50px 0; background:#24426f; margin:5px;">
        <div class="row">
          <div class="col-md-12 text-center">
            <i class="fas fa-file-invoice-dollar" style="font-size:50px; color:white;"></i>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center" style="color:white;">Cuentas por Pagar</h2>
          </div>
        </div>
      </a>


      <a href="/facturacion-y-cobranza" class="panel" style="width:20rem; padding:50px 0; background:#51AFE1; margin:5px;">
        <div class="row">
          <div class="col-md-12 text-center">
            <i class="fas fa-file-invoice" style="font-size:50px; color:white;"></i>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center" style="color:white;">Facturación y Cobranza</h2>
          </div>
        </div>
      </a>


      <a href="/totalizadores" class="panel" style="width:20rem; padding:50px 0; background:#24426f; margin:5px;">
        <div class="row">
          <div class="col-md-12 text-center">
            <i class="fas fa-hand-holding-usd" style="font-size:50px; color:white;"></i>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center" style="color:white;">Totalizadores</h2>
          </div>
        </div>
      </a>


      <a href="/usuarios-configuracion" class="panel" style="width:20rem; padding:50px 0; background:#51AFE1; margin:5px;">
        <div class="row">
          <div class="col-md-12 text-center">
            <i class="fas fa-users" style="font-size:50px; color:white;"></i>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center" style="color:white;">Usuarios y Configuración</h2>
          </div>
        </div>
      </a>
</div><!--row-->

</div>
@endsection
