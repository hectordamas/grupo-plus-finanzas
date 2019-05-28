$('.beneficiary-container').on('click', function(){
    $('.beneficiary-container').css('display','none');
});

$('.beneficiary-modal').on('click', function(){
    var id = $(this).data('id');
    var number = $(this).data('number');
    $.ajax({
      headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },
      url: '/beneficiaries/' + id,
      type: 'GET',
      dataType: 'json',
      success: function(data){
        $('.beneficiary-container').css('display','flex');
        $('.nombre').html(data.beneficiary.name);
        $('.nation').html(data.beneficiary.nation);
        $('.identification').html(data.beneficiary.identification);
        $('.number').html(number);
      }
    });
  });

  $('#nameDirectory').on('select2:select', function(){
    var name = $('#nameDirectory').val();
    $.ajax({
      headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },
      url: '/beneficiaries/search/' + name,
      type: 'POST',
      dataType: 'json',
      data:{
        name: name
      },
      success: function(data){
      $('#idDirectory').val();
      $('#numberDirectory').val();
      $('#nation').val();
      }, 
    });
  });

  $('#DirectoryForm').on('submit', function(e){
    if($('#numberDirectory').val() < 20 || $('#numberDirectory1').val() < 20 || $('#numberDirectory2').val() < 20){
      alert('Los números de cuenta deben tener 20 digitos');
      return false;
    }else{
      e.preventDefault();
      var name = $('#nameDirectory').val();
      var id = $('#idDirectory').val();
      var number = $('#numberDirectory').val();
      var number1 = $('#numberDirectory1').val();
      var number2 = $('#numberDirectory2').val();
      var nation = $('#nation').val();
        $.ajax({
          headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
          },
          url: '/beneficiaries',
          type: 'POST',
          dataType: 'json',
          data: {
            identification:id,
            name:name,
            number:number,
            number1:number1,
            number2:number2,
            nation:nation,
          }, 
          success:function(data){
            $('.nameDirectory').html('');
            $('.idDirectory').html('');
            $('.numberDirectory').html('');
            $('#numberDirectory').val('');
            $('#idDirectory').val('');
            $('#nameDirectory').val('');
            $('#DirectoryTable').prepend(
                '<tr><td>'+data.beneficiary.name+'</td><td>'+data.beneficiary.nation+'</td><td>'+data.beneficiary.identification+'</td><td><a href="#" onClick="añadirBeneficiario('+data.beneficiary.id+','+data.beneficiary.number+')" class="Añadir" data-id='+data.beneficiary.id+' data-number='+data.beneficiary.number+'>'+data.beneficiary.number+'</a></td><td><a href="#" onClick="añadirBeneficiario('+data.beneficiary.id+','+data.beneficiary.number1+')" class="Añadir" data-id='+data.beneficiary.id+' data-number='+data.beneficiary.number1+'>'+data.beneficiary.number1+'</a></td><td><a href="#" onClick="añadirBeneficiario('+data.beneficiary.id+','+data.beneficiary.number2+')" class="Añadir" data-id='+data.beneficiary.id+' data-number='+data.beneficiary.number2+'>'+data.beneficiary.number2+'</a></td></tr>'
                );
          },
          error:function(error){
            if(error.responseJSON.hasOwnProperty('errors')){
              $('.nameDirectory').html('');
              $('.idDirectory').html('');
              $('.numberDirectory').html('');
  
              if(error.responseJSON.errors.name){
                  $('.nameDirectory').html(error.responseJSON.errors.name);
              }
              if(error.responseJSON.errors.identification){
                $('.idDirectory').html(error.responseJSON.errors.identification);
              }
              if(error.responseJSON.errors.number){
                $('.numberDirectory').html(error.responseJSON.errors.number);
              }
            }
          }
        });
    }
  });


  $('.Añadir').on('click', function(){
    var id = $(this).data('id');
    var number = $(this).data('number');

    $.ajax({
      headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },
      url: '/beneficiaries/' + id,
      type: 'GET',
      dataType: 'json',
      success: function(data){
        $('#numeroDeCuenta').val(number);
        $('#beneficiary').html('<option value="'+data.beneficiary.id+'">'+data.beneficiary.name+'</option>');
        $('.directory-container').css('display', 'none');
      }
    });
  });

  function formatDemandAmount(value){
    var demandAmount = new Intl.NumberFormat().format(value);
    $('#demandAmount').html(demandAmount);
  }
  
  function añadirBeneficiario(id, number){
    $.ajax({
      headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },
      url: '/beneficiaries/' + id,
      type: 'GET',
      dataType: 'json',
      success: function(data){
        $('#numeroDeCuenta').val(number);
        $('#beneficiary').html('<option value="'+data.beneficiary.id+'">'+data.beneficiary.name+'</option>');
        $('.directory-container').css('display', 'none');
      }
    });
  }
  
  $('#Directory').on('click', function(){
    $('.directory-container').css('display', 'flex');
  });
  $('#Close').on('click', function(){
    $('.directory-container').css('display', 'none');
  });
  