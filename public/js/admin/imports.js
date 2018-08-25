$(document).ready(function(){
  $('#importarRevenda').click(function(){
    if($('#cnpj').val() > 8){
      $('#loading').removeClass('d-none');
      $('#cnpj').attr('disabled', 'disabled');
      $('#importarRevenda').attr('disabled', 'disabled');
      $.ajax({
        url: '/admin/revenda/import',
        type: 'post',
        dataType: 'json',
        data: {_token:  $('meta[name="csrf-token"]').attr('content'), cnpj: $('#cnpj').val()},
        success: function(data){
          $('#importarRevenda').removeAttr('disabled');
          alert('Revenda importada com sucesso!');
        },
        error:function( jqXHR, textStatus, errorThrown ){
          alert('Você deve aguardar mais um pouco para importar uma revenda novamente. Há um tempo limite de 1 minuto para consultas.')
        },
        complete: function( jqXHR, textStatus ){
          $('#loading').addClass('d-none');
          $('#importarRevenda').removeAttr('disabled');
        }
      });
    }else{
      alert('Preencha o campo com o CNPJ');
    }
  });
});
