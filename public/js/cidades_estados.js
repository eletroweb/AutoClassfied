$(document).ready(function(){
  $.ajax({
    url: 'http://api.londrinaweb.com.br/PUC/Estados/BR/0/10000',
    type: 'get',
    contentType: "application/json; charset=utf-8",
		dataType: "jsonp",
		async:false,
    success: function(data){
      $('#estado').html('<option value="">Selecione o estado...</option>');
      $.each(data, function(index, value){
        $('#estado').append($('<option>',{
          value: value.UF,
          text: value.Estado
        }));
      });
    }
  });
  $('#estado').change(function(){
    $.ajax({
      url: 'http://api.londrinaweb.com.br/PUC/Cidades/'+$('#estado').val()+'/BR/0/10000',
      type: 'get',
      contentType: "application/json; charset=utf-8",
		  dataType: "jsonp",
		  async:false,
      success: function(data){
        $('#cidade').html('<option value="">Selecione a cidade...</option>');
        $.each(data, function(index, value){
          $('#cidade').append($('<option>',{
            value: value,
            text: value
          }));
        });
      }
    })
  });
});
