@extends('layouts.interface')
@section('content')
<div class="container-fluid" style="margin-top:30px;">


  <div class="row d-flex justify-content-center">
   @foreach($companies as $company)
   <div class="card" style="width:30rem;">
     <div class="card-body d-flex justify-content-center">
       <table class="table table-bordered table-striped" style="width:100%;">
         <thead>
             <th colspan="3" class="text-center table-dark">{{ $company->abbreviation }}</th>
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
            @if($account->bank->type == "Banco Internacional")
              @php
                $totalCompany = $totalCompany + ($account->entry - $account->expense);
                $totalNotAvailableCompany = $totalNotAvailableCompany + $account->notavailable;
              @endphp
              <tr>
                <td>{{ $account->bank->name }}</td>
                <td>{{ number_format($account->entry - $account->expense,2,'.', ',')}} USD</td>
                <td>{{ number_format($account->notavailable,2,'.', ',')}} USD</td>
              </tr>
            @endif
          @endforeach
            <tr>
              <td> <strong>Totales:</strong></td>
              <td><strong>{{ number_format($totalCompany,2,'.', ',')}} USD</strong></td>
              <td><strong>{{ number_format($totalNotAvailableCompany,2,'.', ',')}} USD</strong></td>
            </tr>
         </tbody>
       </table>
     </div>
   </div>
  @endforeach
  </div>
  
<br>

<div class="row d-flex justify-content-center">
  <div style="width:90rem;">
    <div class="card">
      <div class="card-body d-flex justify-content-center">
        <table style="width:100%;" class="table table-bordered table-striped">
          <thead class="table-dark">
            <tr>
              <th colspan="4" class="text-center">
                Consolidado
              </th>
            </tr>
            <tr>
              <th>Bancos:</th>
              <th>Disponible:</th>
              <th>No Disponible:</th>
              <th>Total Disponible:</th>
            </tr>
          </thead>
          <tbody>
            @php
              $totalavailable = 0;
              $totalnotavailable = 0;
              $totalavailableavailable = 0;
            @endphp

            @foreach($banks as $bank)
              @if($bank->type == 'Banco Internacional')
                @php
                  $entry = 0;
                  $expense = 0;
                  $notavailable = 0;
                    foreach($bank->accounts as $account){
                      $entry = $entry + $account->entry;
                      $expense = $expense + $account->expense;
                      $notavailable = $notavailable + $account->notavailable;
                      $totalavailableavailable = $totalavailableavailable + (($entry - $expense) - $notavailable); 
                    }
                      $totalnotavailable = $totalnotavailable + $notavailable;
                      $totalavailable = $totalavailable + ($entry - $expense);
                  @endphp
              <tr>
                <td>{{$bank->name}}</td>
                <td>{{  number_format($entry - $expense,2,'.', ',') }} USD</td>
                <td>{{  number_format($notavailable,2,'.',',') }} USD</td>
                <td>{{  number_format(($entry - $expense) - $notavailable,2,'.',',') }} USD</td>
              </tr>
              @endif
            @endforeach
            <tr>
              <td><strong>Total</strong></td>
              <td><strong>{{ number_format($totalavailable,2,'.', ',') }} USD</strong></td>
              <td><strong>{{ number_format($totalnotavailable,2,'.',',') }} USD</strong></td>
              <td><strong>{{ number_format($totalavailableavailable,2,'.',',') }} USD</strong></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

</div>
@endsection
