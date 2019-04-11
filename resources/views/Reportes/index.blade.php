@extends('layouts.interface')
@section('content')
<div class="container-fluid">
  <div class="row mt-5">
    <a href="/reportes" style="color:white;"><i class="fas fa-arrow-left"></i> Volver Atrás</a>
  </div>

    <div class="card">
      <div class="card-header">
        Reportes | Bancos Nacionales
      </div>
      <div class="card-body">
        <table class="table table-bordered stripe" id="DataTable">
          <thead class="table-dark">
            <th>#</th>
            <th>Fecha</th>
            <th>Empresa</th>
            <th>Banco</th>
            <th>Bs.S</th>
            <th>Tasa</th>
            <th>ITF</th>
            <th>USD</th>
            <th>Beneficiario</th>
            <th>Tipo</th>
            <th>Status</th>
            <th>Cta. Contable</th>
            <th>Motivo</th>
            <th><i class="fas fa-check"></i></th>
          </thead>
          <tbody>
            @foreach($registers as $register)
              @if($register->account->bank->type == 'Banco Nacional')
              <tr>
                <td>{{$register->id}}</td>
                <td>{{date_format(new DateTime($register->date), "d/m/Y") }}</td>
                <td>{{$register->account->company->abbreviation}}</td>
                <td>{{$register->account->bank->name}}</td>
                @if($register->type == 'Ingreso')
                <td>{{number_format($register->amount,2, ',', '.')}} Bs.S</td>
                @else
                <td>- {{number_format($register->amount,2, ',', '.')}} Bs.S</td>
                @endif
                <td>{{number_format($register->rate,2, ',', '.')}} Bs.S</td>
                <td>{{number_format($register->feed,2, ',', '.')}} Bs.S</td>
                @if($register->type == 'Ingreso')
                <td>{{number_format(($register->amount / $register->rate),2, ',', '.')}} USD</td>
                @else
                <td>- {{number_format(($register->amount / $register->rate),2, ',', '.')}} USD</td>
                @endif
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
            if($register->account->bank->type == 'Banco Nacional'){
              if($register->type == 'Egreso'){
                $total = $total - $register->amount;
                $totalUSD = $totalUSD - ($register->amount / $register->rate);
              }else{
                $total = $total + $register->amount;
                if($register->rate){
                  $totalUSD = $totalUSD + ($register->amount / $register->rate);
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
              <tr>
              <td><strong>Bolívares: </strong></td>
              <td><strong>{{number_format($total,2,'.', ',') }} </strong> Bs.S</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>

  @endsection
