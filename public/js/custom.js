var drop_anuncio;

function autoRemove(element){
  if(confirm('Deseja realmente remover?')){
    element.remove();
  }
}

function removeParent(element){
  console.log(element.parent().remove());
}

function contabilizarVisualizacao(anuncio, uid){
  $.ajax({
    url: '/anuncios/count/visualizacao/',
    type: 'POST',
    dataType: 'json',
    data: {_token: $('meta[name="csrf-token"]').attr('content'), user_id: uid, anuncio_id: anuncio}
  });
}

function showEndereco(rua, bairro, cidade, estado, numero){
  $('#endereco').html('Rua '+rua+' '+numero+', '+bairro+' - '+cidade+', '+estado);
  $('#enderecoModal').modal('show');
}

function showModalMessage(message){
  $('#messageModal').html(message);
  $('#modalMessage').modal('show');
}

$(document).ready(function(){
  $('.showModalMessage').click(function(){
    showModalMessage($(this).attr('text'));
  });
  $('#destaques').slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 3,
      responsive: [
                    {
                      breakpoint: 1024,
                      settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                      }
                    },
                    {
                      breakpoint: 600,
                      settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                      }
                    },
                    {
                      breakpoint: 480,
                      settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                      }
                    }
                  ]
  });
  drop_anuncio = $('#dropzone').dropzone({
    url: "/imagens/store",
    uploadMultiple: true,
    parallelUploads: 12,
    maxFiles: 12,
    autoQueue: true,
    acceptedFiles: "image/*",
    paramName: "imagem", // The name that will be used to transfer the file
    maxFilesize: 1, // MB
    dictDefaultMessage: 'Awaaaaaaaaaaaay',
    previewTemplate: '<div class="dz-preview dz-file-preview col-sm-4">'+
                      '<div class="dz-details">'+
                        '<div class="dz-filename"><span data-dz-name class="badge badge-primary"></span></div>'+
                        '<div class="dz-size" data-dz-size></div>'+
                        '<img data-dz-thumbnail />'+
                      '</div>'+
                      '<div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>'+
                      '<div class="dz-error-message"><span data-dz-errormessage></span></div>'+
                     '</div>',
    accept: function(file, done) {
      done();
    },
    success: function(data){
      if(data.xhr.responseText !== 'false'){
          var input = $('<input type="hidden">');
          input.attr('name', 'imagens[]');
          input.val(data.xhr.responseText.replace('\"', '').replace('\\', ''));
          $('#anunciar').append(input);
      }
    }
  });
  /*$('input:file').change(function(){
    //input = $.parseHTML(input);
    $.each($(this).prop('files'), function(key, value){
      //console.log(value);
      var input = $('<input type="file">');
      input.attr('name', 'imagens[]');
      input.addClass("d-none");
      input.val(value);
      var li = $('<li>');
      li.addClass('list-group-item');
      li.html('<i class="fa fa-file mr-4"></i><span class="badge badge-primary mr-3">'+value.name.substring(0,10)+'</span><button onclick="removeParent($(this))" type="button" class="close_file btn badge badge-pill badge-danger"><i class="fa fa-times-circle"></i></button>');
      li.append(input)
      $('#imagens_selecionadas').append(li);//.html($('#imagens_selecionadas').html()+'<li class="list-group-item ">'+value.name+input+'<button onclick="removeParent($(this))" type="button" class="close_file"><i class="fa fa-times-circle"></i></button></li>');
    });
  });*/
  $('.plano').click(function(){
    $('#plano_label').html('Você selecionou o '+$(this).children('.card-body').children('.card-title').html());
    $('.plano').each(function(){
      $(this).removeClass('bg-success text-light');
      $(this).addClass('bg-light text-dark');
    });
    $(this).removeClass('bg-light text-dark');
    $(this).addClass('bg-success text-light');
    $('#plano').val($(this).val());
  });
  $('.select2').select2({
    theme: 'bootstrap'
  });
  $('.versao').select2({
    tags: true,
    theme: 'bootstrap'
  });
  $('#addAdicional').click(function(){
    if($('#adicional').val() !== ''){
        $('#adicionais').append('<button type="button" onclick="autoRemove($(this))" class="list-group-item list-group-item-action del-hover">'+$('#adicional').val()+'<input type="hidden" name="adicionais[]" value="'+$('#adicional').val()+'"></button>');
        $('#adicional').val('');
    }else{
      alert('Você precisa preencher o campo para adicionar');
    }
  });
  $('#addAcessorio').click(function(){
    if($('#acessorio').val() !== ''){
        $('#acessorios').append('<button type="button" onclick="autoRemove($(this))" class="list-group-item list-group-item-action del-hover">'+$('#acessorio').val()+'<input type="hidden" name="acessorios[]" value="'+$('#adicional').val()+'"></button>');
        $('#acessorio').val('');
    }else{
      alert('Você precisa preencher o campo para adicionar');
    }
  });
  $('#cadastrar_revenda').click(function(){
    if($('#plano').val() != ''){
      $('#cadastro-revenda').submit();
    }else{
      alert('Você precisa selecionar um plano para a revenda.');
    }
  });
  $('#documento').mask('000.000.000-00', {reverse: true});
  $('.telefone').mask('(00) 0000-0000');
  $("#anunciar").submit(function(){
     var value = $('#valor').cleanVal();
     $('#valor').val(value);
   });
   $('#cnpj').click(function(){
     $('#info_documento').html('CNPJ');
     $('#documento').mask('00.000.000/0000-00', {reverse: true});
     $('#pessoa_fisica').val('0');
   });
   $('#cpf').click(function(){
     $('#info_documento').html('CPF');
     $('#pessoa_fisica').val('1');
     $('#documento').mask('000.000.000-00', {reverse: true});
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
  $('.cpf').mask('000.000.000-00', {reverse: true});
  $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
  $('.cep').mask('00000-000');
  $('#telefone').mask('(00) 0 0000-0000');
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
      if($('#marca_loaded') !== undefined){
        $('#marca').val($('#marca_loaded').val()).trigger('change');
      }
      
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
        if($('#marca').val() !==''){
          $.each(data, function (i, item) {
            $('#modelo').append($('<option>', {
                value: item.id,
                text : item.nome
            }));
          });
          if($('#modelo_loaded') !== undefined){
            $('#modelo').val($('#modelo_loaded').val()).trigger('change');
          } 
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
        if($('#modelo').val() !== ''){
          $.each(data, function (i, item) {
            $('#versao').append($('<option>', {
                value: item.id,
                text : item.nome
            }));
          });
        }
        if($('#versao_loaded') !== undefined){
          $('#versao').val($('#versao_loaded').val()).trigger('change');
        } 
      }
    });
  });
});
