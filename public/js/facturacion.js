$('#amountBill').on('input', function(){
    var monto = new Intl.NumberFormat().format($('#amountBill').val());
    $('#amountStrong').html(monto);
});

$('#rateBill').on('input', function(){
    var monto = new Intl.NumberFormat().format($('#rateBill').val());
    $('#rateStrong').html(monto + ' Bs.S');
});
$(document).ready(function(){
  searchBanks();
});
$('#currency, #billCompany').on('input', function(){
  searchBanks();
});
$('#AñadirCliente').on('click', function(){
  $('.clientes-container').css('display', 'flex');
});
$('#Close-Client').on('click', function(){
  $('.clientes-container').css('display', 'none');
});

function searchBanks(){
    if($('#currency').val() == 'Bolívares'){
      $.ajax({
        headers:{
          'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },
        url:'/showAccountNumber1',
        type:'POST',
        dataType: 'json',
        data:{
          company: $('#billCompany').val(),
        },
        success:function(data){
          $('#billBank').html(data.outputAccountNumber);
        }
      });
    }else{
      $.ajax({
        headers:{
          'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },
        url:'/companyEntriesExpenses',
        type:'POST',
        dataType: 'json',
        data:{
          company: $('#billCompany').val(),
        },
        success:function(data){
          $('#billBank').html(data.outputAccountNumber);
        }
      });
    }
  }

  $('#ClientForm').on('submit', function(e){
    e.preventDefault();
    var name = $('#clientDirectory').val();
    var rif = $('#rifDirectory').val();

      $.ajax({
        headers: {
          'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },
        url: '/clients',
        type: 'POST',
        dataType: 'json',
        data: {
          name:name,
          rif:rif,
        },  
        success:function(data){
          $('#rifDirectory').val('');
          $('#clientDirectory').val('');

          $('.clientDirectoryError').html('');
          $('.rifDirectoryError').html('');

          $('#DirectoryTable').prepend('<tr><td>'+data.client.name+'</td><td>'+data.client.rif+'</td><td><a href="#" onClick="añadirCliente('+data.client.id+')" data-id='+data.client.id+'>Añadir</a></td></tr>');
          $('.clientes-container').css('display', 'none');
          $('#client').html('<option value="'+data.client.rif+'">'+ data.client.rif +' - '+ data.client.name+'</option>');
        },
        error:function(error){
          if(error.responseJSON.hasOwnProperty('errors')){
            $('.clientDirectoryError').html('');
            $('.rifDirectoryError').html('');

            if(error.responseJSON.errors.name){
              $('.clientDirectoryError').html(error.responseJSON.errors.name);
            }
            if(error.responseJSON.errors.identification){
              $('.rifDirectoryError').html(error.responseJSON.errors.rif);
            }
          }
        }
      });
  });

  function añadirCliente(id){
    $.ajax({
      headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },
      url: '/clients/' + id,
      type: 'GET',
      dataType: 'json',
      success: function(data){
      $('#client').html('<option value="'+data.client.rif+'">'+data.client.rif+ ' - ' + data.client.name + '</option>');
        $('.clientes-container').css('display', 'none');
      }
    });
  }
  $('.AñadirCliente').on('click', function(){
    var id = $(this).data('id');
    $.ajax({
      headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },
      url: '/clients/' + id,
      type: 'GET',
      dataType: 'json',
      success: function(data){
        $('#client').html('<option value="'+data.client.rif+'">' + data.client.rif + ' - ' + data.client.name + '</option>');
        $('.clientes-container').css('display', 'none');
      }
    });
  });

  $('#BillForm').on('submit', function(){
    if(confirm("Estás seguro(a) de ejecutar esta petición?")){
      return true;
    }else{
      return false;
    }
  });