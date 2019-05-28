$('#CrearSolicitud').on('submit', function(){
  if(confirm('Estás seguro de crear esta solicitud')){
    return true
  }else{
    return false
  }
});

$('#TipoRegistro').on('input', function(){
    if($('#TipoRegistro').val() ==  'Egreso'){
        $('.cuentas-container').css('display', 'flex');
    }
});

$('.statusDemands').on('click', function(){
  $('#formDemandsStatus').submit();
});


$('#Pay').on('click', function(){
     var id = $(this).data('id');
     $.ajax({
        url: '/getDemand/' + id,
        type: 'GET',
        dataType: 'json',
        success: function(data){
            $('.cuentas-container').css('display', 'none');
            $('#Fecha').val(data.demand.payDate);
            $('#TipoRegistro').html('<option value="Egreso">Egreso</option>');
            $('#company1').html('<option value='+data.company.name+'>'+data.company.name+'</option>');
            $.ajax({
                headers:{
                  'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                url:'/showAccountNumber1',
                type:'POST',
                dataType: 'json',
                data:{
                  company: data.company.name,
                },
                success:function(data2){
                  $('#bank1').html(data2.outputAccountNumber);
                }
              });
            var newOption = new Option(data.demand.contable);
            $('#Monto').val(data.demand.amount);
            $('#demand_id').val(data.demand.id);
            $('#MontoFormateado').html(new Intl.NumberFormat().format(data.demand.amount) + ' Bs.S');
            $('#Beneficiario').val(data.beneficiary.name);
            $('#Status').html('<option value="Pagado">Pagado</option>');
            $('#CuentaContable').html(newOption);
            $('#Motivo').html('<option value='+data.demand.reason+'>'+data.demand.reason+'</option>');
        }
     });
});
