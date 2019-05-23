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

$('#client').on('select2:select', function(){
  $.ajax({
    headers:{
      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    },
    url:'/searchClient',
    type:'POST',
    dataType: 'json',
    data:{
      client: $('#client').val(),
    },
    success:function(data){
      var newOption = new Option(data.seller);
      $('#seller').html(newOption);
    }
  });
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

  $('.DataTables').DataTable();