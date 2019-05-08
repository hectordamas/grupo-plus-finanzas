@extends('layouts.interface')
@section('content')
<div class="container-fluid" style="margin-top:30px;">

  <br>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Empresas
        </div>
        <div class="card-body" style="padding:50px;">
          <div class="row">
            <a href="/companies/create" class="btn btn-primary">Registrar una Cuenta</a>
          </div>
          <br>
          <div class="row">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Empresas</th>
                  <th>Abreviatura</th>
                  <th>RIF</th>
                  <th>Dirección</th>
                </tr>
              </thead>
              <tbody>
                @foreach($companies as $company)
                <tr>
                  <td><a href="/companies/{{$company->id}}">{{$company->name}}</a></td>
                  <td>{{$company->abbreviation}}</td>
                  <td>{{$company->rif}}</td>
                  <td>{{$company->address}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('alert.modal')
@endsection
