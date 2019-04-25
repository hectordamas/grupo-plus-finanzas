@if($demand->status == 'Aprobado' || $demand->status == 'No Aprobado')
<div class="modified-container">
    <div class="modified text-center">
        <i class="fas fa-exclamation"></i>
        <br>
        <br>
        <h3 style="color:white;">Esta solicitud ya ha sido modificada Anteriormente</h3>
        <a href="#" class="btn btn-light" id="modified-link">Continuar de Todas Formas</a>
    </div>
</div>
@endif