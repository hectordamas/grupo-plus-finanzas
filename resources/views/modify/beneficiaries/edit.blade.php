@extends('layouts.interface')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Modificar Beneficiarios
                </div>
                <div class="card-body">
                    <form action="/beneficiaries/{{$beneficiary->id}}" method="post" class="row">
                        @method('PATCH')
                        @csrf
                        <div class="col-md-3 form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" name="name" id="name" value="{{$beneficiary->name}}" required placeholder="Nombre" class="form-control">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="number">Número de Cuenta:</label>
                            <input name="number" type="number" value="{{$beneficiary->number}}" id="number" maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required placeholder="Número de Cuenta" class="form-control">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="nation">Tipo:</label>
                            <select name="nation" id="nation" class="form-control">
                                <option value="{{$beneficiary->nation}}">{{$beneficiary->nation}}</option>
                                <option value="V">V</option>
                                <option value="J">J</option>
                                <option value="E">E</option>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="identification">Identificación:</label>
                            <input name="identification" type="identification" value="{{$beneficiary->identification}}" id="identification" required placeholder="Número de Cuenta" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Modificar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection