$(document).ready(function(){
  $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
  $('#importarRevenda').click(function(){
    if($('#cnpj').val().length == 18){
      $('#loading').removeClass('d-none');
      $('#cnpj').attr('disabled', 'disabled');
      $('#importarRevenda').attr('disabled', 'disabled');
      $.ajax({
        url: '/admin/revenda/import',
        type: 'post',
        dataType: 'json',
        data: {_token:  $('meta[name="csrf-token"]').attr('content'),
         cnpj: $('#cnpj').val().replace('-', '').replace('-', '').replace('-', '').replace('/', '')},
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
  $('#importAll').click(function(){
    $('#importAll').attr('disabled', 'disabled');
    $('#loading_import_all').removeClass('d-none');
    $.ajax({
      url: '/cronjob/update/all',
      type: 'get',
      dataType: 'json',
      success: function(data){
        alert('Marcas e modelos importados com sucesso!');
      },
      error:function( jqXHR, textStatus, errorThrown ){
        alert('Você deve aguardar mais um pouco para importar as marcas, modelos e versões. Há um tempo limite de 1 minuto para consultas.')
      },
      complete: function( jqXHR, textStatus ){
        $('#loading_import_all').addClass('d-none');
        $('#importAll').removeAttr('disabled');
      }
    });
  });
});
