@extends('layouts.interface')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            <div class="card">
                <div class="card-header">
                    Verificar Solicitud #{{$demand->id}}
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>
                                <strong>
                                    Departamento:
                                </strong>
                            </td>
                            <td>
                                {{$demand->departamento}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    Empresa:
                                </strong>
                            </td>
                            <td>
                                {{$demand->company->name}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    Fecha de Solicitud:
                                </strong>
                            </td>
                            <td>
                                {{date_format(new DateTime($demand->currentDate), 'd-m-Y')}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    Fecha de Pago:
                                </strong>
                            </td>
                            <td>
                                {{date_format(new DateTime($demand->payDate), 'd-m-Y')}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    Beneficiarion | Proveedor:
                                </strong>
                            </td>
                            <td>
                                {{ $demand->beneficiary->name }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    Cuenta Contable
                                </strong>
                            </td>
                            <td>
                                {{ $demand->contable }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    Motivo
                                </strong>
                            </td>
                            <td>
                                {{ $demand->reason }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    Monto
                                </strong>
                            </td>
                            <td>
                                {{ number_format($demand->amount, 2,',', '.') . $demand->coin}} 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    Solicitado Por
                                </strong>
                            </td>
                            <td>
                                {{ $demand->user->name}} 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Estatus</strong>
                            </td>
                            <td>
                                @if($demand->status == 'En Revisión')
                                <form action="/update/demands/{{$demand->id}}" id="formDemandsStatus" method="post">
                                    @csrf
                                    <input type="radio" class="statusDemands" name="status" checked value="En Revisión">En Revisión <br>
                                    <input type="radio" class="statusDemands" name="status" value="Aprobado"> Aprobado <br>
                                    <input type="radio" class="statusDemands" name="status" value="No Aprobado"> No Aprobado 
                                    <br>
                                </form>
                                @elseif($demand->status == 'Aprobado')
                                <form action="/update/demands/{{$demand->id}}" id="formDemandsStatus" method="post">
                                    @csrf
                                    <input type="radio" class="statusDemands" name="status" checked value="Aprobado"> Aprobado <br>
                                    <input type="radio" class="statusDemands" name="status" value="En Revisión">En Revisión <br>
                                    <input type="radio" class="statusDemands" name="status" value="No Aprobado"> No Aprobado
                                    <br>
                                </form>
                                @else
                                <form action="/update/demands/{{$demand->id}}" id="formDemandsStatus" method="post">
                                    @csrf
                                    <input type="radio" class="statusDemands"  name="status" checked value="No Aprobado"> No Aprobado <br>
                                    <input type="radio" class="statusDemands"  name="status" value="Aprobado"> Aprobado <br>
                                    <input type="radio" class="statusDemands"  name="status" value="En Revisión">En Revisión <br>
                                </form>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection