@extends('layouts.interface')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Modificar Vendedores
                </div>
                <div class="card-body">
                <table class="table table-striped table-bordered" id="DataTable" width="100%">
                    <thead class="table-dark">
                            <th>Vendedores</th>
                            <th>Eliminar</th>
                            <th>Modificar</th>
                        </thead>
                    <tbody>
                        @foreach($sellers as $seller)
                        <tr>
                            <td> {{$seller->name}} </td>
                            <td>
                                <form action="/sellers/{{$seller->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="far fa-times-circle"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="/sellers/{{$seller->id}}/edit" class="btn btn-success">
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