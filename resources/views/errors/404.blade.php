@extends('layouts.interface')
@section('content')
<div class="container">
  <div class="row mt-5">
    <a href="javascript:history.back()" style="color:white;"><i class="fas fa-arrow-left"></i> Volver Atrás</a>
  </div>
</div>
<div class="container-fluid d-flex justify-content-center" style="height:100vh; align-items:center;">
  <div class="text-center">
    <h1 style="color:white; font-size:85px;">404</h1>
    <h2 style="color:white;">No hemos podido encontrar lo que buscas...</h2>
    <a href="/home" style="color:white;"><i class="fas fa-arrow-left"></i> Ir a la Página Principal</a>
  </div>
</div>
@endsection
