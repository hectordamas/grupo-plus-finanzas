@extends('layouts.interface')
@section('content')
<div class="container-fluid">
  <div class="row mt-5">
  </div>


  <div class="row d-flex justify-content-center">
   @foreach($companies as $company)
   <div class="card mr-1 mb-2" style="width:30rem;">
     <div class="card-body d-flex justify-content-center">
       <table class="table table-bordered table-striped" style="width:100%;">
         <thead>
          <th colspan="3" class="text-center">
              @if($company->image)
              <img src="{{ $company->image }}" alt="{{ $company->name }}" width="80px">
              @else
              {{$company->abbreviation}}
              @endif
            </th>
         </thead>
         <tbody>
           <tr>
             <td>Bancos:</td>
             <td>Disponible:</td>
             <td>No Disponible:</td>
           </tr>
           @php
            $totalCompany = 0;
            $totalNotAvailableCompany = 0;
           @endphp

          @foreach($company->accounts as $account)
            @if($account->bank->type == "Banco Nacional")
              @php
                $totalCompany = $totalCompany + ($account->entry - $account->expense);
                $totalNotAvailableCompany = $totalNotAvailableCompany + $account->notavailable;
              @endphp
              <tr>
                <td>{{ $account->bank->name }}</td>
                <td>{{ number_format($account->entry - $account->expense,2,'.', ',')}} Bs.S</td>
                <td>{{ number_format($account->notavailable,2,'.', ',')}} Bs.S</td>
              </tr>
            @endif
          @endforeach
            <tr>
              <td> <strong>Totales:</strong></td>
              <td><strong>{{ number_format($totalCompany,2,'.', ',')}} Bs.S</strong></td>
              <td><strong>{{ number_format($totalNotAvailableCompany,2,'.', ',')}} Bs.S</strong></td>
            </tr>
         </tbody>
       </table>
     </div>
   </div>
  @endforeach
  </div>
</div>
@endsection
