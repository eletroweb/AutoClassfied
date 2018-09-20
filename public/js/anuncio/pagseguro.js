var bin_bandeira = '';
var hashComprador = '';

function loadSenderHash(){
  $.ajax({
    url: '/pagseguro/startSession',
    dataType: 'json',
    type: 'post',
    data: {_token: $('meta[name="csrf-token"]').attr('content')},
    success: function(data){
      PagSeguroDirectPayment.setSessionId(data[0]);
      PagSeguroDirectPayment.onSenderHashReady(function(response){
        if(response !== undefined){
            if(response.status == 'error') {
                console.log(response.message);
                return false;
            }
            hashComprador = response.senderHash; //Hash estará disponível nesta variável.
            $('#btnPagar').prop('disabled', false);
            $('#btnPagar').html('Processar informações');
        }
      });
    }
  });
}

function beforeStoreAnuncio(){
  if($('#senderHash').val() === '' && $('.tipo_anuncio').val() === 'y'){
     $('#errorModal').modal('show');
     return false;
  }
  return true;
}

$(document).ready(function(){
	$('#btnPagar').prop('disabled', true);
	$('#btnPagar').html('Carregando...');
	$('#checkoutModal').on('show.bs.modal', function (e) {
		  loadSenderHash();
	});
	$('#cartao').mask('0000-0000-0000-0000');
	$('#month').mask('00');
	$('#year').mask('0000');
  //Tipo anúncio é y para anúncios destacados
	$('.tipo_anuncio').change(function(){
		if($(this).val() == 'y'){
      $('#tipo_pagamento_destaque').collapse('show');
      $('.tipo_pagamento').change(function(){
        if($(this).val() === 'boleto'){
            loadSenderHash();
        }else{
          $('#checkoutModal').modal();    
        }
      });
		}else{
      $('#tipo_pagamento_destaque').collapse('hide');
    }
	});
	$('#btnPagar').click(function(){
		if($('#nome').val() !== '' && $('#telefone').val().length >= 10 && $('#cpf').val().length == 14 && $('#logradouro').val() !== ''
				&& $('#cidade').val() !== '' && $('#bairro').val() !== '' && $('#uf').val() !== '' && $('#cep').val().length == 9
				&& $('#cartao').val().length == 19 && $('#month').val().length == 2 && $('#year').val().length == 4) {
					//Se o formulário estiver todo preenchido...
					$('#btnPagar').prop('disabled', true);
					$('#btnPagar').html('Processando informações...');
					PagSeguroDirectPayment.getBrand({
						cardBin: $('#cartao').cleanVal(),
							success: function(response) {
								//bandeira encontrada
								var param = {
										cardNumber: $('#cartao').cleanVal(),
										brand: response.bin,
										cvv: $('#cvv').val(),
										expirationMonth: $('#month').val(),
										expirationYear: $('#year').val(),
										success: function(r) {
												$('#card-token').val(r.card.token);
												$('#btnPagar').html('Informações processadas');
                        $('#checkoutModal').modal('hide');
										},
										error: function(r) {
												//tratamento do erro
												alert('Erro ao processar informações de pagamento.');
												$('#btnPagar').html('Processar informações');
												$('#btnPagar').prop('disabled', false);
												console.log(r);
										},
										complete: function(r) {
												//tratamento comum para todas chamadas
												//$('#btnPagar').html('Processar pagamento');
										}
								}
								PagSeguroDirectPayment.createCardToken(param);
							},
							error: function(response) {
								alert('Erro ao processar bandeira do cartão, verifique se o número foi digitado corretamente.');
								console.log(response);
							},
							complete: function(response) {

							}
					});
				}else{
					alert('Você precisa preencher todas as informações para prosseguir');
				}
	});
});

