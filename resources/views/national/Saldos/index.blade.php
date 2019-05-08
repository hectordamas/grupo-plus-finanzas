@extends('layouts.interface')
@section('content')
<div class="container-fluid">
  <div class="row mt-5">
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <table class="table table-bordered" id="DataTable">
              <thead class="table-dark">
                <tr>
                  <th colspan="4" class="text-center">
                    Saldos | Bancos Nacionales
                  </th>
                </tr>
              </thead>
              <tbody>

                @foreach($companies as $company)
                  <tr>
                    <td colspan="4" style="text-align:center;">
                      <strong>{{$company->name}}<strong>
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Bancos:</strong></td>
                    <td><strong>Ingresos:</strong></td>
                    <td><strong>Egresos:</strong></td>
                    <td><strong>Disponible:</strong></td>
                  </tr>
                  @php
                    $totalIngreso = 0;
                    $totalEgreso = 0;
                  @endphp
                  @foreach($company->accounts as $account)
                  @if($account->bank->type == 'Banco Nacional')
                    @php
                      $totalIngreso = $totalIngreso + $account->entry;
                      $totalEgreso = $totalEgreso + $account->expense;
                    @endphp
                  <tr>
                    <td>{{$account->bank->name}}</td>
                    <td>{{number_format($account->entry, 2, ',', '.')}} Bs.S</td>
                    <td>{{number_format($account->expense, 2, ',', '.')}} Bs.S</td>
                    <td>{{number_format($account->entry - $account->expense, 2, ',', '.')}} Bs.S</td>
                  </tr>
                  @endif
                  @endforeach
                  <tr>
                    <td><strong>Total En General:</strong></td>
                    <td><strong>{{number_format($totalIngreso, 2, ',', '.')}} Bs.S</strong></td>
                    <td><strong>{{number_format($totalEgreso, 2, ',', '.')}} Bs.S</strong></td>
                    <td><strong>{{number_format($totalIngreso - $totalEgreso, 2, ',', '.')}} Bs.S</strong></td>
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
