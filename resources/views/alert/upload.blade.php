<div class="upload-container">
    <div class="upload text-center">
        <div class="card input-upload">
            <div class="card-header">
                <h5 style="float:left;" class="mt-1"></h5>
                <a href="#" class="mt-1" style="float:right; color:red;" id="CloseUpload">Cerrar <i class="far fa-times-circle"></i></a>
            </div>
            <div class="card-body">
            <form method="post" id="UploadPDF" enctype="multipart/form-data">
                @csrf
                <div class="custom-file">
                    <input accept=".pdf" type="file" name="file" class="custom-file-input" id="customFileUpload">
                    <label class="custom-file-label" for="customFile">Elegir un Archivo</label>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>