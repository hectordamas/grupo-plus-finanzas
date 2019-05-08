@extends('layouts.interface')
@section('content')
<div class="container-fluid" style="margin-top:30px;">

  <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Operaciones por Pagar
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered" id="DataTable">
                        <thead class="table-dark">
                            <th>Dpto.</th>
                            <th>Emp.</th>
                            <th>Fecha de Solicitud</th>
                            <th>Fecha de Pago</th>
                            <th>Beneficiario | Proveedor</th>
                            <th>Cta. Contable</th>
                            <th>Motivo</th>
                            <th>Monto</th>
                            <th>PDF</th>
                            <th>Estatus</th>
                        </thead>
                        <tbody>
                        @foreach($demands as $demand)
                            <tr>
                                <td> {{$demand->departamento}} </td>
                                <td> {{$demand->company->name}} </td>
                                <td> {{ date_format(new DateTime($demand->currentDate), 'd/m/Y') }} </td>
                                <td> {{ date_format(new DateTime($demand->payDate), 'd/m/Y') }} </td>
                                <td> <a href="#" data-id="{{$demand->beneficiary->id}}" class="beneficiary-modal">{{$demand->beneficiary->name}}</a> </td>
                                <td class="table-100"> {{$demand->contable}}</td>
                                <td class="table-100"> {{$demand->reason}} </td>
                                <td> {{number_format($demand->amount, 2, '.', ',') }} {{$demand->coin}} </td>
                                <td>
                                    @if($demand->pdf)
                                    <a href="{{$demand->pdf}}" target="_blank">Ver</a>
                                    @else
                                    <a href="#" class="uploadBtn btn btn-success" data-id="{{$demand->id}}">
                                        <i class="fas fa-cloud-upload-alt" style="font-size:30px;"></i>
                                    </a>
                                    @endif
                                </td>
                                <td> 
                                    <form action="/updatePaid/demands/{{$demand->id}}" method="post" id="paidForm{{$demand->id}}">
                                        @csrf
                                        <input type="radio" class="paid paid1" data-id="{{$demand->id}}" name="paid" value="Por Pagar" checked> Por Pagar
                                        <input type="radio" class="paid paid2" data-id="{{$demand->id}}" name="paid" value="Pagado"> Pagado 
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                 </table>
            </div>
        </div>
      </div>
  </div>


  <br>
    <div class="row">
    @foreach($companies as $company)
        @php
            $totalUSD = 0;
            $totalBs = 0;

            foreach($company->demands as $demand){
                if($demand->coin == 'USD' && $demand->status == 'Aprobado' && $demand->paid == 'Por Pagar'){
                    $totalUSD = $totalUSD + $demand->amount;
                }elseif($demand->coin == 'Bs.S' && $demand->status == 'Aprobado' && $demand->paid == 'Por Pagar'){
                    $totalBs = $totalBs + $demand->amount;
                }
            }
        @endphp
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header">
                    Totales ({{$company->name}})
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Divisas</th>
                            <th>Bolívares</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td> {{number_format($totalUSD, 2, '.', ',')}} USD</td>
                                <td> {{number_format($totalBs, 2, '.', ',')}} Bs.S</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
    </div><!--row-->

</div>
@include('alert.modal')
@endsection