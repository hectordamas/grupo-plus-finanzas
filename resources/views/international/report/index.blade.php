@extends('layouts.interface')
@section('content')
<div class="container-fluid">
  <div class="row mt-5">
  </div>

    <div class="card">
      <div class="card-header">
        Reportes | Bancos Internacionales
      </div>
      <div class="card-body">
        <table class="table table-bordered" id="DataTable">
          <thead class="table-dark">
            <th>#</th>
            <th>Fecha</th>
            <th>Empresa</th>
            <th>Banco</th>
            <th>USD</th>
            <th>Responsable</th>
            <th>Beneficiario</th>
            <th>Tipo</th>
            <th>Status</th>
            <th>Cta. Contable</th>
            <th>Motivo</th>
            <th><i class="fas fa-check"></i></th>
          </thead>
          <tbody>
            @foreach($registers as $register)
              @if($register->account->bank->type == 'Banco Internacional')
              <tr>
                <td>{{$register->id}}</td>
                <td>{{date_format(new DateTime($register->date), "d/m/Y") }}</td>
                <td>{{$register->account->company->abbreviation}}</td>
                <td>{{$register->account->bank->name}}</td>
                @if($register->type == 'Ingreso')
                <td>{{number_format($register->amount,2, ',', '.')}} USD</td>
                @else
                <td>- {{number_format($register->amount,2, ',', '.')}} USD</td>
                @endif
                <td>{{$register->responsable}}</td>
                <td>{{$register->beneficiary}}</td>
                <td>{{$register->type}}</td>
                <td>{{$register->status}}</td>
                <td>{{$register->contable}}</td>
                <td>{{$register->reason}}</td>
                <td>{{$register->verifyName}}</td>
              </tr>
              @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
<br>
    <div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          <strong>Totales</strong>
        </div>
        <div class="card-body">
          <div class="row">
          @php
            $total = 0;
            $totalUSD = 0;
          @endphp
          @foreach($registers as $register)
            @php
            if($register->account->bank->type == 'Banco Internacional'){
              if($register->type == 'Egreso'){
                $total = $total - ($register->amount * $register->rate);
                $totalUSD = $totalUSD - $register->amount;
              }else{
                $totalUSD = $totalUSD + $register->amount;
                if($register->rate){
                  $total = $total + ($register->amount * $register->rate);
                }//endif
              }//endif
            }//endif
            @endphp
          @endforeach
            <table class="table">
              <tr>
              <td><strong>Divisas: </strong></td>
              <td>{{number_format($totalUSD,2,'.', ',') }} </strong> USD</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>
  @endsection
