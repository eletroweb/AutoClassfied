$(document).ready(function(){
  $("#anunciar").submit(function(){
     var value = $('#valor').cleanVal();
     $('#valor').val(value);
   });
  $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:3
          },
          1000:{
              items:5
          }
      }
  })
  $("#myCarousel").on("slide.bs.carousel", function(e) {
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $(".carousel-item").length;

    if (idx >= totalItems - (itemsPerSlide - 1)) {
      var it = itemsPerSlide - (totalItems - idx);
      for (var i = 0; i < it; i++) {
        // append slides to end
        if (e.direction == "left") {
          $(".carousel-item")
            .eq(i)
            .appendTo(".carousel-inner");
        } else {
          $(".carousel-item")
            .eq(0)
            .appendTo($(this).find(".carousel-inner"));
        }
      }
    }
  });
  $('#cpf').mask('000.000.000-00', {reverse: true});
  $('#telefone').mask('(00) 0000-0000');
  $('#celular').mask('(00) 0 0000-0000');
  $('#valor').mask("#.##0,00", {reverse: true});
  $('.valor').mask("#.##0,00", {reverse: true});
  $.ajax({
    url: '/ajax/veiculos/marcas',
    type: 'get',
    dataType: 'json',
    success:function(data){
      $('#marca').html('<option value="">Selecione a marca...</option>');
      $('#modelo').html('<option value="">Selecione o modelo...</option>');
      $('#versao').html('<option value="">Selecione a versão...</option>');
      $.each(data, function (i, item) {
        $('#marca').append($('<option>', {
            value: item.id,
            text : item.nome
        }));
      });
    }
  });
  $('#marca').change(function(){
    $('#modelo').html('<option value="">Carregando...</option>');
    $.ajax({
      url: '/ajax/veiculos/modelos',
      dataType: 'json',
      type: 'get',
      data: {marca: $(this).val()},
      success: function(data){
        $('#modelo').html('<option value="">Selecione o modelo...</option>');
        $('#versao').html('<option value="">Selecione a versão...</option>');
        if($('#marca').val() != ''){
          $.each(data, function (i, item) {
            $('#modelo').append($('<option>', {
                value: item.id,
                text : item.nome
            }));
          });
        }
      }
    });

  });
  $('#modelo').change(function(){
    $.ajax({
      url: '/ajax/veiculos/versoes',
      dataType: 'json',
      type: 'get',
      data: {modelo: $(this).val()},
      success: function(data){
        $('#versao').html('<option value="">Selecione a versão...</option>');
        if($('#modelo').val() != ''){
          $.each(data, function (i, item) {
            $('#versao').append($('<option>', {
                value: item.id,
                text : item.nome
            }));
          });
        }
      }
    });
  });
});
