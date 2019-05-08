@extends('layouts.interface')
@section('content')
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Modificar Solicitudes
                </div>
                <div class="card-body">
                <table class="table table-striped table-bordered" id="DataTable" width="100%">
                    <thead>
                        <th>Nombre</th>
                        <th>Iniciales</th>
                        <th>Rol</th>
                        <th>Correo</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->initials}}</td>
                            <td>{{$user->role}}</td>
                            <td>{{$user->email}}</td>
                            <td> 
                                <a href="/edit/user/{{$user->id}}" class="btn btn-success">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </td>
                            <td>
                                <form action="/users/{{$user->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="far fa-times-circle"></i>
                                </button>
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
</div>
@include('alert.modal')
@endsection