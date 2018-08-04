$(document).ready(function(){
  $.ajax({
    url: 'http://fipeapi.appspot.com/api/1/carros/marcas.json',
    type: 'get',
    dataType: 'json',
    success: function(data){
      $.each(data, function (i, item) {
        $('#marca_fipe').append($('<option>', {
            value: item.id,
            text : item.fipe_name
        }));
      });
    }
  });
  $('#marca_fipe').change(function(){
    $('#modelo_fipe').html('<option value="">Selecione o modelo...</option>');
    if($(this).val() !== ''){
      $.ajax({
        url: 'http://fipeapi.appspot.com/api/1/carros/veiculos/'+$('#marca_fipe').val()+'.json',
        dataType: 'json',
        type: 'get',
        success: function(data){
          $.each(data, function (i, item) {
            $('#modelo_fipe').append($('<option>', {
                value: item.id,
                text : item.fipe_name
            }));
          });
        }
      });
    }
  });
  $('#modelo_fipe').change(function(){
    $('#versao_fipe').html('<option value="">Selecione a versão...</option>');
    if($(this).val() !== ''){
      $.ajax({
        url: 'http://fipeapi.appspot.com/api/1/carros/veiculo/'+$('#marca_fipe').val()+'/'+$('#modelo_fipe').val()+'.json',
        dataType: 'json',
        type: 'get',
        success: function(data){
          $.each(data, function (i, item) {
            $('#versao_fipe').append($('<option>', {
                value: item.id,
                text : item.name
            }));
          });
        }
      });
    }
  });
  $('#buscar_fipe').click(function(){
    if($('#marca_fipe').val() !== '' && $('#modelo_fipe').val() !== '' && $('#versao_fipe').val() !== ''){
      $.ajax({
        url: 'http://fipeapi.appspot.com/api/1/carros/veiculo/'+$('#marca_fipe').val()+'/'+$('#modelo_fipe').val()+'/'+$('#versao_fipe').val()+'.json',
        type: 'get',
        dataType: 'json',
        success: function(data){
          $('#preco_fipe').html(data.preco);
          $('#veiculo_fipe').html(data.name);
          $('#combustivel').html('<b>Combustível:</b>'+data.combustivel);
          $('#referencia').html('<b>Referência:</b>'+data.referencia);
          $('#marca').html('<b>Marca:</b>'+data.marca);
          $('#ano').html('<b>Ano:</b>'+data.ano_modelo);
          $('#result').removeClass('d-none');
        }
      });
    }else{
      alert('Você precisa preencher todo o formulário para realizar a consulta');
    }
  });
});
