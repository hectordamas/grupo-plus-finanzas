<div class="directory-container" style="overflow:auto;">
    <div class="card" style="max-width:1000px; width:70%; margin:auto;">
        <div class="card-header">
            <h5 style="float:left;" class="mt-1">Directorio</h5>
            <a href="#" class="mt-1" style="float:right; color:red;" id="Close">Cerrar <i class="far fa-times-circle"></i></a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h6>Registrar un Beneficiario</h6>
                </div>
            </div>
            <form class="row" id="DirectoryForm">
                <div class="form-group col-md-3">
                    <input type="text" id="nameDirectory"  required placeholder="Nombre" class="form-control">
                    <span class="text-danger nameDirectory"></span>
                </div>
                <div class="form-group col-md-3">
                    <input type="text" id="idDirectory" required placeholder="Identificación" class="form-control">
                    <span class="text-danger idDirectory"></span>
                </div>
                <div class="form-group col-md-4">
                    <input type="number" id="numberDirectory" maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required placeholder="Número de Cuenta" class="form-control">
                    <span class="text-danger numberDirectory"></span>
                </div>
                <div class="form-group col-md-2">
                    <input type="submit" class="btn btn-success rounded-0" value="Registrar">
                </div>
            </form>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered DataTable" id="DirectoryTable">
                        <thead class="table-dark">
                            <th>Beneficiario</th>
                            <th>Identificación</th>
                            <th>N° de Cuenta</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($beneficiaries as $beneficiary)
                                <tr>
                                    <td> {{$beneficiary->name}} </td>
                                    <td> {{$beneficiary->identification}} </td>
                                    <td> {{$beneficiary->number}} </td>
                                    <td> <a href="#" class="Añadir" data-id="{{$beneficiary->id}}">Añadir</a> </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>            
        </div>
    </div>
</div>