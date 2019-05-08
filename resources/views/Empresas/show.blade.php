@extends('layouts.interface')
@section('content')
<div class="container-fluid">
  <br>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5>{{$company->name}}</h5>
        </div>
        <div class="card-body" style="padding:50px;">
          <table class="table table-bordered" id="DataTable">
            <thead>
              <tr>
                <th>Banco</th>
                <th>Número de Cuenta</th>
                <th>Tipo</th>
                <th>Modificar</th>
              </tr>
            </thead>
            <tbody>
              @foreach($company->accounts as $account)
              <tr>
                <td><a href="/accounts/{{$company->id}}">{{$account->bank->name}}</a></td>
                <td>{{$account->number}}</td>
                <td>{{$account->bank->type}}</td>
                <td><a href="/accounts/{{$company->id}}">Modificar</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
