<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@if($demand->paid == 'Por Pagar')
    @if($demand->status == 'Aprobado')
        <h3>La solicitud N° {{$demand->id}}, Ha sido aprobada </h3>
    @else
        <h3>La solicitud N° {{$demand->id}}, Ha sido rechazada </h3>
    @endif
@else
    <h3>La solicitud N° {{$demand->id}}, Ha sido Pagada </h3>
@endif
<br>
    <table border="1px" cellpadding="10px">
        <thead>
            <th>#</th>
            <th>Dpto.</th>
            <th>Empresa</th>
            <th>Fecha de Solicitud</th>
            <th>Fecha de Pago</th>
            <th>Beneficiario | Proveedor</th>
            <th>Monto</th>
            <th>Cta. Contable</th>
            <th>Motivo</th>
            <th>Solicitado por:</th>
            <th>Estatus</th>
            @if($demand->pdf)
            <th>PDF</th>
            @endif
        </thead>
        <tbody>
            <tr>
                <td> {{$demand->id}} </td>
                <td> {{$demand->departamento}} </td>
                <td> {{$demand->company->name}} </td>
                <td> {{ date_format(new Datetime($demand->currentDate), 'd-m-Y') }} </td>
                <td> {{ date_format(new Datetime($demand->payDate), 'd-m-Y') }} </td>
                <td> {{$demand->beneficiary->name}} </td>
                <td> {{ number_format($demand->amount, 2, '.', ',') . $demand->coin}} </td>
                <td> {{$demand->contable}} </td>
                <td> {{$demand->reason}} </td>
                <td> {{$demand->user->name}} </td>
                <td> {{$demand->status}} </td>
                @if($demand->pdf)
                <td> <a href="{{ url($demand->pdf) }}" target="_blank">Ver PDF</a> </td>
                @endif
            </tr>
        </tbody>
    </table>
    <br>
</body>
</html>