@extends('layouts.interface')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Modificar
                </div>
                <div class="card-body">
                    <form action="/clients/{{$client->id}}" method="post" class="row">
                        @csrf
                        @method('PATCH')
                        <div class="form-group col-md-3">
                            <label for="name">Nombre</label>
                            <input name="name" type="text" value="{{$client->name}}" class="form-control">    
                        </div>
                        <div class="form-group col-md-3">
                            <label for="rif">RIF</label>
                            <input name="rif" type="text" value="{{$client->rif}}" class="form-control">    
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" class="btn btn-primary" value="Modificar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('alert.modal')
@endsection