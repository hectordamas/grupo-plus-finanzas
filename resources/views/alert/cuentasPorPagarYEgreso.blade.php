<div class="cuentas-container" style="overflow:auto;">
    <div class="card" style="width:90%;">
        <div class="card-header">
            <h5 class="mt-1">Operaciones por Pagar <span style="font-size:12px;">(Selecciona la operación que deseas pagar)</span></h5>
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
                            <th></th>
                        </thead>
                        <tbody>
                        @foreach($demands as $demand)
                            <tr>
                                <td> {{$demand->departamento}} </td>
                                <td> {{$demand->company->name}} </td>
                                <td> {{ date_format(new DateTime($demand->currentDate), 'd/m/Y') }} </td>
                                <td> {{ date_format(new DateTime($demand->payDate), 'd/m/Y') }} </td>
                                <td> {{$demand->beneficiary->name}} </td>
                                <td class="table-100"> {{$demand->contable}}</td>
                                <td class="table-100"> {{$demand->reason}} </td>
                                <td> {{number_format($demand->amount, 2, '.', ',') }} {{$demand->coin}} </td>
                                <td> 
                                    <a href="#" id="Pay" data-id="{{$demand->id}}">Pagar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                 </table>
        </div>
    </div>
</div>