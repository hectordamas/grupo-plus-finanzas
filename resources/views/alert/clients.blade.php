<div class="clientes-container" style="overflow:auto;">
    <div class="card" style="max-width:1000px; width:70%; margin:auto;">
        <div class="card-header">
            <h5 style="float:left;" class="mt-1">Clientes</h5>
            <a href="#" class="mt-1" style="float:right; color:red;" id="Close-Client">Cerrar <i class="far fa-times-circle"></i></a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered DataTable" id="DirectoryTable">
                        <thead class="table-dark">
                            <th>Cliente</th>
                            <th>RIF</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <td> {{$client->name}} </td>
                                    <td> {{$client->rif}} </td>
                                    <td> <a href="#" class="AñadirCliente" data-id="{{$client->id}}">Añadir</a> </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> 
            <hr>          
            <div class="row">
                <div class="col-md-12">
                    <h6>Registrar un Cliente</h6>
                </div>
            </div>
            <form class="row" id="ClientForm">
                <div class="form-group col-md-3">
                    <input type="text" id="clientDirectory"  required placeholder="Nombre" class="form-control">
                    <span class="text-danger clientDirectoryError"></span>
                </div>
                <div class="form-group col-md-3">
                    <input type="text" id="rifDirectory" required placeholder="RIF" class="form-control" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                    <span class="text-danger rifDirectoryError"></span>
                </div>
                <div class="form-group col-md-2">
                    <input type="submit" class="btn btn-success rounded-0" value="Registrar">
                </div>
            </form>
        </div>
    </div>
</div>