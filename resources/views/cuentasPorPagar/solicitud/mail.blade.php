<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GrupoPlus Finanzas</title>
</head>
<body>
    <h3>Verifica la solicitud N° {{$demand->id}} </h3>
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
    <p><a href="{{ url('/edit/demands/'. $demand->id) }}" target="_blank">Haz click aquí</a> para aprobar la solicitud</p>
</body>
</html>