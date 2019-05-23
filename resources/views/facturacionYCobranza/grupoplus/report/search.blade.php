@extends('layouts.interface')
@section('content')
<div class="container" style="margin-top:30px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Reportes | Facturación
                </div>
                <div class="card-body">
                    <form class="row" action="/search/bill" method="post">
                        @csrf
                        <div class="form-group col-md-3">
                            <label for="date">
                                Fecha
                            </label>
                            <input id="date" type="date" value="{{ date('Y-m-d') }}" class="form-control"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="from">
                                Desde:
                            </label>
                            <input id="from" type="date" class="form-control"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="to">
                                Hasta:
                            </label>
                            <input id="to" type="date" class="form-control"/>
                        </div>
                        <div class="form-group col-md-3">
                            <br>
                            <input type="submit" class="btn btn-primary" value="Ver Reporte">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection