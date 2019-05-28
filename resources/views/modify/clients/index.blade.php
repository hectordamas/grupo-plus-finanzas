@extends('layouts.interface')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Modificar Clientes
                </div>
                <div class="card-body">
                <table class="table table-striped table-bordered" id="DataTable" width="100%">
                    <thead class="table-dark">
                            <th>Clientes</th>
                            <th>RIF</th>
                            <th>Eliminar</th>
                            <th>Modificar</th>
                        </thead>
                    <tbody>
                        @foreach($clients as $client)
                        <tr>
                            <td> {{$client->name}} </td>
                            <td> {{$client->rif}} </td>
                            <td>
                                <form action="/clients/{{$client->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="far fa-times-circle"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="/clients/{{$client->id}}/edit" class="btn btn-success">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('alert.modal')
@endsection