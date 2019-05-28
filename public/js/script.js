/* Select2 */
$(".select2").select2({
  tags: true
});

/*setTimeout*/
setTimeout(function(){
  $('.success-message').fadeOut();
}, 1000);

setTimeout(function(){
  $('.checked-container').fadeOut();
}, 2000);

$('#modal').on('click', function(){
  $('#modal').fadeOut();
});
$('#modified-link').on('click', function(){
  $('.modified-container').fadeOut();
});
$('.checked-container').on('click', function(){
  $('.checked-container').fadeOut();
});


$('.paid').on('click', function(){
  var id = $(this).data('id');
  if(confirm('Realmente deseas realizar esta petición?')){
    $('#paidForm' + id).submit();
  }else{
    if($(this).hasClass('paid1')){
      $('.paid2').prop('checked', true);
      $('.paid1').prop('checked', false);
    }else{
      $('.paid2').prop('checked', false);
      $('.paid1').prop('checked', true);
    }
  }
});


$('#calculator').on('click', function(){
  window.open("https://codepen.io/hector29/full/peMONg", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=800");
});


$('.update').hide();
$('#Disponible, #Pagado').on('click', function(){
  $('#verify').prop('checked', true);
  $('.update').show();
});

$('#Girado, #Diferido').on('click', function(){
  $('#verify').prop('checked', false);
  $('.update').hide();
});


setTimeout(function(){$('#modal').fadeOut();}, 5000);

/** Esconder CambioDeDivsa*/
$('.FormCambioDivisaWrapper').hide();
$('#TipoRegistro').on('input', function(){
  if($('#TipoRegistro').val() == 'Cambio de Divisa'){
    $('.FormIngresoYEgreso').hide();
    $('.FormCambioDivisaWrapper').show();
  }
});

/* Calcular el Total de Operaciones en bolívares de las divisas */
$('#Cantidad').on('input', function(){
  var Cantidad = $('#Cantidad').val();
  var Tasa = $('#Tasa').val();
  var TotalOperacion = Cantidad *  Tasa;
  $('#TotalOperacion').val(new Intl.NumberFormat().format(TotalOperacion.toFixed(2)) + ' Bs.S');
});


$('#Tasa').on('input', function(){
  var Cantidad = $('#Cantidad').val();
  var Tasa = $('#Tasa').val();
  var TotalOperacion = Cantidad *  Tasa;
  $('#TotalOperacion').val(new Intl.NumberFormat().format(TotalOperacion.toFixed(2)) + ' Bs.S');
});

/* Crear el formulario de Cantidad De Transacciones en la sección del cambio de divisa*/
$('#CantidadDeTransacciones').on('input', function(){
  $('.Transacciones').html('');
  var TotaldeTransacciones = 0;
  var Cantidad = $('#Cantidad').val();
  var CantidadDeTransacciones = $('#CantidadDeTransacciones').val();
  for (let i = 0; i < CantidadDeTransacciones; i++){
    $('.Transacciones').append('<div class="row"><div class="form-group col"><label><strong>Banco Nacional</strong></label><select class="form-control select2 selectTransaction" name="BancoNacionalDeTransacciones'+i+'"></select></div><div class="form-group col"><label><strong>Beneficiario</strong></label><input type="text" class="form-control" name="BeneficiarioDeTransacciones'+i+'"/></div><div class="form-group col"><label for="MontoDeTransacciones'+i+'"><strong>Monto (Bs.S)</strong></label><input type="number" step="any" value="0" class="MontoDeTransaccionesEnCambioDeDivisas form-control min-0" min="0" required data-id="'+i+'" name="MontoDeTransacciones'+i+'" id="MontoDeTransacciones'+ i +'" oninput="compare(this.id, '+ i +')"/><span><strong id="format'+i+'"></strong></span></div></div>');
    TotaldeTransacciones = TotaldeTransacciones + $('#MontoDeTransacciones' + i).val();
  }
  $.ajax({
  headers:{
    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
  },
  url:'/selectTransaction',
  type:'POST',
  dataType: 'json',
  data:{
  },
  success:function(data){
      $('.selectTransaction').append(data.outputAccountNumber);
      console.log(data);
    }
  });
});


/*Comparar si las transacciones superan el total del cambio de divisa */
function compare(id, num){
  var CantidadDeTransacciones = $('#CantidadDeTransacciones').val();
  var TotaldeTransacciones = 0;
  var Cantidad = $('#Cantidad').val();
  var Tasa = $('#Tasa').val();
  var MontoDeTransacciones = 0;
  var TotalOperacion = Tasa * Cantidad;
  for (let i = 0; i < CantidadDeTransacciones; i++) {
    MontoDeTransacciones = parseInt($('#MontoDeTransacciones'+ i).val()) || 0;
    TotaldeTransacciones = TotaldeTransacciones + MontoDeTransacciones;
    $('#format'+i).html(new Intl.NumberFormat().format(MontoDeTransacciones) + ' Bs.S');
  }
   if (TotaldeTransacciones > TotalOperacion) {
    alert('El monto colocado en los campos excede el total del cambio de divisa');
    let val = $('#' + id).val();
    $('#' + id).val(val.slice(0,-1));
    $('#format'+ num).html(new Intl.NumberFormat().format($('#' + id).val()) + ' Bs.S');
  }
}

$('#Empresas').on('submit', function(){
  var accountNumber = $('#accountNumber').val().length;
  if(accountNumber < 20){
    alert('El número de cuenta es menor a 20 digitos, inténtalo nuevamente');
    return false;
  }else{
    return true;
  }
});

$('#Divisa').on('submit', function(e){
  var Cantidad = $('#Cantidad').val();
  var Tasa = $('#Tasa').val();
  var CantidadDeTransacciones = $('#CantidadDeTransacciones').val();
  var TotalOperacion = Tasa * Cantidad;
  var TotaldeTransacciones = 0;
  var MontoDeTransacciones = 0;
  for (let i = 0; i < CantidadDeTransacciones; i++) {
    MontoDeTransacciones = parseInt($('#MontoDeTransacciones'+ i).val()) || 0;
    TotaldeTransacciones = TotaldeTransacciones + MontoDeTransacciones;
  }
  if(TotaldeTransacciones < TotalOperacion){
    alert('Ingresa un monto válido');
    return false;
  }else{
    return true
  }
});

/*Formatear Montos*/
$('#Monto').on('input', function () {
  var monto = $('#Monto').val();
  $('#MontoFormateado').html(new Intl.NumberFormat().format(monto) + ' Bs.S');
});

$('#amount').on('input', function () {
  var monto = $('#amount').val();
  $('#MontoFormateado').html(new Intl.NumberFormat().format(monto));
});

$('#TASA').on('input', function () {
  var tasa = $('#TASA').val();
  $('#TASASpan').html(new Intl.NumberFormat().format(tasa) + ' Bs.S');
});

$('#monto').on('input', function(){
  var monto = $('#monto').val();
  $('#montoFormateado').html(new Intl.NumberFormat().format(monto) + ' Bs.S');
});

/*Formatear Cantidades*/
$('#Cantidad').on('input', function(){
  var cantidad = $('#Cantidad').val();
  $('#CantidadFormateada').html(new Intl.NumberFormat().format(cantidad) + ' USD');
});

/*Formatear Tasa*/
$('#Tasa').on('input', function(){
  var tasa = $('#Tasa').val();
  $('#TasaFormateada').html(new Intl.NumberFormat().format(tasa) + ' Bs.S');
});

/*Mostrar cuentas*/
$('#company').on('input', function(){
  $.ajax({
    headers:{
      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    },
    url:'/showAccountNumber',
    type:'POST',
    dataType: 'json',
    data:{
      company: $('#company').val(),
    },
    success:function(data){
      $('#bank').html(data.outputAccountNumber);
    }
  });
});
////////////////////////////
$('#companyEntriesExpenses').on('input', function(){
  $.ajax({
    headers:{
      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    },
    url:'/companyEntriesExpenses',
    type:'POST',
    dataType: 'json',
    data:{
      company: $('#companyEntriesExpenses').val(),
    },
    success:function(data){
      $('#bankEntriesExpenses').html(data.outputAccountNumber);
    }
  });
});
///////////////////////////////////////
$(document).ready(function(){
  $.ajax({
    headers:{
      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    },
    url:'/companyEntriesExpenses',
    type:'POST',
    dataType: 'json',
    data:{
      company: $('#companyEntriesExpenses').val(),
    },
    success:function(data){
      $('#bankEntriesExpenses').html(data.outputAccountNumber);
    }
    });
});
//////////////////////////////////////
$('#empresas').on('input', function(){
  $.ajax({
    headers:{
      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    },
    url:'/showAccountNumber1',
    type:'POST',
    dataType: 'json',
    data:{
      company: $('#empresas').val(),
    },
    success:function(data){
      $('#bancos').html(data.outputAccountNumber);
    }
  });
});
////////////////////////////////////
$(document).ready(function(){
  $.ajax({
    headers:{
      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    },
    url:'/showAccountNumber',
    type:'POST',
    dataType: 'json',
    data:{
      company: $('#company').val(),
    },
    success:function(data){
      $('#bank').html(data.outputAccountNumber);
    }
  });
});
//////////////////////////////////////
$('#empresasReport').on('input', function(){
  $.ajax({
    headers:{
      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    },
    url:'/showAccountNumberReport',
    type:'POST',
    dataType: 'json',
    data:{
      company: $('#empresasReport').val(),
    },
    success:function(data){
      $('#bancosReport').html(data.outputBank);
    }
  });
});




/*Mostrar cuentas1*/
$(document).ready(function(){
  $.ajax({
    headers:{
      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    },
    url:'/showAccountNumber1',
    type:'POST',
    dataType: 'json',
    data:{
      company: $('#company1').val(),
    },
    success:function(data){
      $('#bank1').html(data.outputAccountNumber);
    }
  });
});
$('#company1').on('input', function(){
  $.ajax({
    headers:{
      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    },
    url:'/showAccountNumber1',
    type:'POST',
    dataType: 'json',
    data:{
      company: $('#company1').val(),
    },
    success:function(data){
      $('#bank1').html(data.outputAccountNumber);
    }
  });
});


//feed Bancario
$('#colFeed').hide();
$('#feed').on('click', function() {
  if(this.checked){
    $('#colFeed').show();
    var Monto = $('#Monto').val();
    var feed = (Monto * 2)/ 100;
    $('#Feed').val(Math.round(feed));
    $('#feedSpan').html(new Intl.NumberFormat().format(feed) + ' Bs.S');
  }else {
    $('#colFeed').hide();
  }
});

//Find Accounts By Company and Bank
$('#bank, #company').on('input', function(){
$.ajax({
  headers:{
    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
  },
  url:'/FindAccountsByCompanyAndBank',
  type:'POST',
  dataType:'json',
  data:{
    bank: $('#bank').val(),
    company: $('#company').val(),
  },
  success: function(data){
    $('#Cuenta').append(data.outputAccounts);
  },
  });
});

//searchCompany
$('#nameSearchCompany').on('select2:select', function(){
   $.ajax({
    headers:{
      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    },
    url:'/searchCompany',
    type:'POST',
    dataType: 'json',
    data:{
        'company': $('#nameSearchCompany').val(),
    },
    success:function(data){
      if(data.company){
        $('#abreviatura').val(data.company.abbreviation);
        $('#rif').val(data.company.rif);
        $('#address').val(data.company.address);
        $('#abreviatura').prop( "readonly", true );
        $('#rif').prop( "readonly", true );
        $('#address').prop( "readonly", true );
      }else{
        $('#abreviatura').val('');
        $('#rif').val('');
        $('#address').val('');
        $('#abreviatura').prop( "readonly", false);
        $('#rif').prop( "readonly", false);
        $('#address').prop( "readonly", false);
      }
    },
   });
});
$(document).ready(function(){
  $.ajax({
    headers:{
      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    },
    url:'/searchCompany',
    type:'POST',
    dataType: 'json',
    data:{
        'company': $('#nameSearchCompany').val(),
    },
    success:function(data){
        $('#abreviatura').val(data.company.abbreviation);
        $('#rif').val(data.company.rif);
        $('#address').val(data.company.address);
        $('#abreviatura').prop( "readonly", true );
        $('#rif').prop( "readonly", true );
        $('#address').prop( "readonly", true );
      },
   });
});


/////TipoRegistro Y Estatus
$('#TipoRegistro').on('input', function(){
  if($('#TipoRegistro').val() == 'Ingreso'){
    $('#Status').html('<option value="Disponible">Disponible</option><option value="Diferido">Diferido</option>');
    $('#checkITF').hide();
  }if($('#TipoRegistro').val() == 'Egreso'){
    $('#Status').html('<option value="Girado">Girado</option><option value="Pagado">Pagado</option>');
    $('#checkITF').show();
  }
});

$(document).ready(function(){
  if($('#TipoRegistro').val() == 'Ingreso'){
    $('#Status').html('<option value="Disponible">Disponible</option><option value="Diferido">Diferido</option>');
    $('#checkITF').hide();
  }if($('#TipoRegistro').val() == 'Egreso'){
    $('#Status').html('<option value="Girado">Girado</option><option value="Pagado">Pagado</option>');
    $('#checkITF').show();
  }
});

$('#DataTable').DataTable({
  paging: false,
});
$('.DataTable').DataTable({
    paging: false,
});

$('.min-0').on('input', function(e){
  var val = $('.min-0').val();
  if(val <= 0){
    $('.min-0').val('');
  }
});

$('.uploadBtn').on('click', function(){
  var id = $(this).data('id'); 
  $('.upload-container').css('display', 'flex');
  $('#UploadPDF').attr('action', '/upload/demand/' + id);
});
$('#CloseUpload').on('click', function(){
  $('.upload-container').css('display', 'none');
});

$('#customFileUpload').on('change', function(){
  if(confirm('Realmente deseas realizar esta petición?')){
    $('#UploadPDF').submit();
  }
});