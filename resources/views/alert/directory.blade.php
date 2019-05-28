<div class="directory-container" style="overflow:auto;">
    <div class="card" style="max-width:1800px; width:98%; margin:auto;">
        <div class="card-header">
            <h5 style="float:left;" class="mt-1">Directorio</h5>
            <a href="#" class="mt-1" style="float:right; color:red;" id="Close">Cerrar <i class="far fa-times-circle"></i></a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered DataTable" id="DirectoryTable">
                        <thead class="table-dark">
                            <th>Beneficiario</th>
                            <th>Tipo</th>
                            <th>Identificación</th>
                            <th>Cuenta #1</th>
                            <th>Cuenta #2</th>
                            <th>Cuenta #3</th>
                        </thead>
                        <tbody>
                            @foreach($beneficiaries as $beneficiary)
                                <tr>
                                    <td> {{$beneficiary->name}} </td>
                                    <td> {{$beneficiary->nation}} </td>
                                    <td> {{$beneficiary->identification}} </td>
                                    <td><a href="#" class="Añadir" data-id="{{$beneficiary->id}}" data-number="{{$beneficiary->number}}">{{$beneficiary->number}}</a></td>
                                    <td><a href="#" class="Añadir" data-id="{{$beneficiary->id}}" data-number="{{$beneficiary->number1}}">{{$beneficiary->number1}}</a></td>
                                    <td><a href="#" class="Añadir" data-id="{{$beneficiary->id}}" data-number="{{$beneficiary->number2}}">{{$beneficiary->number2}}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> 
            <hr>          
            <div class="row">
                <div class="col-md-12">
                    <h6>Registrar un Beneficiario</h6>
                </div>
            </div>
            <form class="row" id="DirectoryForm">
                <div class="form-group col-md-2">
                    <input type="text" id="nameDirectory"  required placeholder="Nombre" class="form-control">
                    <span class="text-danger nameDirectory"></span>
                </div>
                <div class="form-group col-md-1">
                    <select id="nation" class="form-control">
                        <option value="V">V</option>
                        <option value="J">J</option>
                        <option value="E">E</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <input type="text" id="idDirectory" required placeholder="Identificación" class="form-control">
                    <span class="text-danger idDirectory"></span>
                </div>
                <div class="form-group col-md-2">
                    <input type="number" id="numberDirectory" maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required placeholder="N° Cuenta 1" class="form-control">
                    <span class="text-danger numberDirectory"></span>
                </div>
                <div class="form-group col-md-2">
                    <input type="number" id="numberDirectory1" maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="N° Cuenta 2" class="form-control">
                    <span class="text-danger numberDirectory1"></span>
                </div>
                <div class="form-group col-md-2">
                    <input type="number" id="numberDirectory2" maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="N° Cuenta 3" class="form-control">
                    <span class="text-danger numberDirectory2"></span>
                </div>
                <div class="form-group col-md-1">
                    <input type="submit" class="btn btn-success rounded-0" value="Registrar">
                </div>
            </form>
        </div>
    </div>
</div>